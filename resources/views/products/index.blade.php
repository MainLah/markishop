<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style/main-style.css" />
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
            <a class="nav-links">Cart</a>
          </li>
          <li>
            <a class="nav-links">Profile</a>
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
            <a class="nav-links">Cart</a>
          </li>
          <li>
            <a class="nav-links">Profile</a>
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
        <h1>Catalog</h1>
        <div id="products">
          @foreach ($products as $product)
            @if ($product->is_available) 
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
                <button class="add-to-cart">Add to Cart</button>
                <div class="quantity-control hidden">
                  <button><h3 class="quantity-minus-inputs">-</h3></button>
                  <h3 class="quantity-h3">0</h3>
                  <button><h3 class="quantity-plus-inputs">+</h3></button
                  ><button class="confirm-button">Confirm</button>
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
                <button class="add-to-cart" disabled>Out of stock</button>
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
              {{ $testimony->Testimony }}
            </p>
          </article>
        @endforeach
      </section>

      <!-- contact us -->
      <section id="contact">
        <h1>Contact us</h1>
        <form>
          <input type="text" placeholder="Name" id="name-form" />
          <input type="email" placeholder="Email" id="email-form" />
          <textarea placeholder="Message" id="message-form"></textarea>
          <div>
            <button id="form-button">Send</button>
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

    <script src="script/script.js"></script>
  </body>
</html>
