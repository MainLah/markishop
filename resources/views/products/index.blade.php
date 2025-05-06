<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('style/main-style.css?v=').time()}}" />
    <title>Markishop</title>
  </head>
  <body>
    <!-- header & nav -->
    <header>
      <nav>
        <ul class="desktop">
          <li>
            <a class="nav-links">Home</a>
          </li>
          <li>
            <a class="nav-links">Catalog</a>
          </li>
          <li>
            <a class="nav-links">Testimonies</a>
          </li>
          <li>
            <a class="nav-links">Contact</a>
          </li>
          <li>
            <a class="nav-links" href="{{ route('cart.index') }}">Cart</a>
          </li>
          <li>
            <a class="nav-links">Profile</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="logout-button" type="submit"><p>Logout</p></button>
            </form>
          </li>
        </ul>
        <img
          src="assets/burger-menu-svgrepo-com.svg"
          alt="Menu"
          class="hidden burger-menu-icon"
        />
        <ul class="mobile hidden">
          <li>
            <a class="nav-links">Home</a>
          </li>
          <li>
            <a class="nav-links">Catalog</a>
          </li>
          <li>
            <a class="nav-links">Testimonies</a>
          </li>
          <li>
            <a class="nav-links">Contact</a>
          </li>
          <li>
            <a class="nav-links" href="{{ route('cart.index') }}">Cart</a>
          </li>
          <li>
            <a class="nav-links">Profile</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="logout-button" type="submit"><p>Logout</p></button>
            </form>
          </li>
        </ul>
      </nav>
    </header>

    <main>
      <!-- hero -->
      <section id="hero">
        <h1>Markishop</h1>
        <hr />
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident
          debitis odio animi? Omnis sit ut laborum, numquam, in libero hic,
          ipsum mollitia qui fugiat nulla! Consectetur architecto porro
          dignissimos aliquid in officia cumque saepe dicta dolore fuga, aliquam
          voluptates. Odio sunt alias iusto laudantium nobis nulla, tempora
          perferendis enim quisquam eaque? Hic a vero totam nulla id qui
          obcaecati, ipsam similique voluptas? Doloribus repudiandae perferendis
          obcaecati aliquid cupiditate fuga, commodi molestias optio
          perspiciatis laudantium assumenda esse rerum hic omnis ad, nisi
          similique fugiat eaque accusantium ea totam. Vero doloribus, quod
          deserunt dignissimos voluptatem cum cupiditate quis eius
          exercitationem nam sapiente!
        </p>
      </section>

      <!-- catalog -->
      <section id="catalog">
        <h1 style="margin-bottom: 1rem;">Catalog</h1>
        <div id="products">
          @foreach ($products as $product)
            @if ($product->is_available) 
              <article data-product-id="{{ $product->id }}">
                <img
                  src="https://images.pexels.com/photos/5760878/pexels-photo-5760878.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                  alt="product"
                  class="product-images"
                />
                <div class="card-text">
                  <h3>{{ $product->name }}</h3>
                  <p>{{ $product->description }}</p>
                  <p>${{ number_format($product->price, 2) }}</p>
                </div>
                <div class="quantity-control">
                  <button class="quantity-button quantity-minus">-</button>
                  <input type="number" class="quantity-input" value="1" min="1">
                  <button class="quantity-button quantity-plus">+</button>
                  <button class="main-button confirm-button">Add to Cart</button>
                </div>
              </article>
            @else
              <article>
                <img
                  src="https://images.pexels.com/photos/5760878/pexels-photo-5760878.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                  alt="product"
                  class="product-images"
                />
                <div class="card-text">
                  <h3>{{ $product->name }}</h3>
                  <p>{{ $product->description }}</p>
                  <p>${{ number_format($product->price, 2) }}</p>
                </div>
                <button class="main-button add-to-cart" disabled>Out of stock</button>
              </article>
            @endif
          @endforeach
        </div>
      </section>

      <!-- testi -->
      <section id="testi">
        <h1>Testimonies</h1>
        @foreach ($testimonies as $testimony)
          <article>
            <span>
              <img
                src="assets/user-3296.svg"
                alt="user"
                class="testimoni-icons"
              />
            </span>

            <p>
              {{ $testimony->testimony }}
            </p>
          </article>
        @endforeach
      </section>

      <!-- contact us -->
      <section id="contact">
        <h1>Contact us</h1>
        <form action="{{ route('testimony.create') }}" method="POST">
          @csrf
          <input type="text" placeholder="Name" id="name-form" name="name"/>
          <input type="email" placeholder="Email" id="email-form" name="email"/>
          <textarea placeholder="Message" id="message-form" name="testimony"></textarea>
          <div>
            <button class="main-button" id="form-button" type="submit">Send</button>
          </div>
        </form>
      </section>
      <h2 id="error-message-form" class="hidden"></h2>
    </main>

    <!-- footer -->
    <footer>
      <p>&copy; 2024 Markishop</p>
      <address>
        <p>123 Market St</p>
        <p>San Francisco, CA 94111</p>
      </address>
    </footer>

    <script src="{{ asset('script/script.js?v=').time() }}"></script>
  </body>
</html>
