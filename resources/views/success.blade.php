<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Luxspace ~ Saingan IKEA</title>
    <meta name="description" content="Menjual furniture" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="Luxspace ~ Saingan IKEA" />
    <meta property="og:description" content="Menjual furniture" />
    <meta property="og:url" content="https://luxspace.com" />
    <meta
      property="og:image"
      content="https://luxspace.com/images/content/preview-homepage.jpg"
    />

    <link rel="apple-touch-icon" href="images/content/favicon.png" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/app.css" />
    <link rel="icon" href="images/favicon.ico" />

    <meta name="theme-color" content="#000" />
  </head>

  <body>
    <!-- Add your site or application content here -->

    <!-- START: Header -->
    <header class="w-full z-50 px-4">
      <div class="container mx-auto py-5">
        <div class="flex flex-strech items-center">
          <div class="w-56 flex items-center">
            <img
              src="images/design/logo.svg"
              alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
            />
          </div>
          <div class="w-full"></div>
          <!-- START: menu hamburger wrapper -->
          <div class="w-auto">
            <ul
              id="menu"
              class="fixed bg-white inset-0 flex flex-col invisible items-center justify-center opacity-0 md:visible md:flex-row md:bg-transparent md:relative md:opacity-100"
            >
              <li class="mx-3 py-6 md:py-0">
                <a href="#" class="text-black hover:underline">Showcase</a>
              </li>
              <li class="mx-3 py-6 md:py-0">
                <a href="#" class="text-black hover:underline">Catalog</a>
              </li>
              <li class="mx-3 py-6 md:py-0">
                <a href="#" class="text-black hover:underline">Delivery</a>
              </li>
              <li class="mx-3 py-6 md:py-0">
                <a href="#" class="text-black hover:underline">Rewards</a>
              </li>
            </ul>
          </div>
          <!-- END: menu hamburger wrapper -->
          <div class="w-auto">
            <ul class="flex item-center">
              <li class="ml-6 block md:hidden">
                <button
                  id="menu-toggler"
                  class="relative flex z-50 items-center w-8 h-8 text-black focus:outline-none"
                >
                  <svg
                    width="18"
                    height="17"
                    viewBox="0 0 18 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="fill-current"
                  >
                    <path
                      d="M15.9773 0.461304H1.04219C0.466585 0.461304 0 0.790267 0 1.19609C0 1.60192 0.466668 1.93088 1.04219 1.93088H15.9773C16.5529 1.93088 17.0195 1.60192 17.0195 1.19609C17.0195 0.790208 16.5529 0.461304 15.9773 0.461304Z"
                    />
                    <path
                      d="M15.9773 7.68802H1.04219C0.466585 7.68802 0 8.01698 0 8.42281C0 8.82864 0.466668 9.1576 1.04219 9.1576H15.9773C16.5529 9.1576 17.0195 8.82864 17.0195 8.42281C17.0195 8.01692 16.5529 7.68802 15.9773 7.68802Z"
                    />
                    <path
                      d="M15.9773 14.9147H1.04219C0.466585 14.9147 0 15.2437 0 15.6495C0 16.0553 0.466668 16.3843 1.04219 16.3843H15.9773C16.5529 16.3843 17.0195 16.0553 17.0195 15.6495C17.0195 15.2436 16.5529 14.9147 15.9773 14.9147Z"
                    />
                  </svg>
                </button>
              </li>
              <li class="ml-6">
                <a
                  id="header-cart"
                  href="/cart"
                  class="flex items-center justify-center w-8 h-8 text-black cart cart-filled"
                >
                  <svg
                    width="29"
                    height="25"
                    viewBox="0 0 29 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="fill-current"
                  >
                    <path
                      d="M10.8754 19.9824C9.61762 19.9824 8.59436 21.023 8.59436 22.3021C8.59436 23.5812 9.61762 24.6218 10.8754 24.6218C12.1331 24.6218 13.1564 23.5812 13.1564 22.3021C13.1563 21.023 12.1331 19.9824 10.8754 19.9824ZM10.8754 23.3265C10.3199 23.3265 9.86796 22.8669 9.86796 22.302C9.86796 21.7371 10.3199 21.2775 10.8754 21.2775C11.4308 21.2775 11.8828 21.7371 11.8828 22.302C11.8828 22.867 11.4308 23.3265 10.8754 23.3265Z"
                    />
                    <path
                      d="M18.8764 19.9824C17.6186 19.9824 16.5953 21.023 16.5953 22.3021C16.5953 23.5812 17.6186 24.6218 18.8764 24.6218C20.1342 24.6218 21.1575 23.5812 21.1575 22.3021C21.1574 21.023 20.1341 19.9824 18.8764 19.9824ZM18.8764 23.3265C18.3209 23.3265 17.869 22.8669 17.869 22.302C17.869 21.7371 18.3209 21.2775 18.8764 21.2775C19.4319 21.2775 19.8838 21.7371 19.8838 22.302C19.8838 22.867 19.4319 23.3265 18.8764 23.3265Z"
                    />
                    <path
                      d="M19.438 7.76947H10.3122C9.96051 7.76947 9.67542 8.0594 9.67542 8.41707C9.67542 8.77474 9.96056 9.06467 10.3122 9.06467H19.438C19.7897 9.06467 20.0748 8.77474 20.0748 8.41707C20.0748 8.05935 19.7897 7.76947 19.438 7.76947Z"
                    />
                    <path
                      d="M18.9414 11.1324H10.8089C10.4572 11.1324 10.1721 11.4223 10.1721 11.78C10.1721 12.1377 10.4572 12.4276 10.8089 12.4276H18.9413C19.293 12.4276 19.5781 12.1377 19.5781 11.78C19.5781 11.4224 19.293 11.1324 18.9414 11.1324Z"
                    />
                    <path
                      d="M25.6499 4.88404C25.407 4.58092 25.0472 4.40711 24.6626 4.40711H4.82655L4.42595 2.42947C4.34232 2.01694 4.06563 1.67055 3.68565 1.50276L0.890528 0.268963C0.567841 0.126419 0.192825 0.276999 0.0528584 0.60505C-0.0872597 0.933204 0.0608116 1.31463 0.383347 1.45696L3.17852 2.69081L6.2598 17.9014C6.38117 18.5004 6.90578 18.9352 7.50723 18.9352H22.7635C23.1152 18.9352 23.4003 18.6452 23.4003 18.2876C23.4003 17.9299 23.1152 17.64 22.7635 17.64H7.50728L7.13247 15.7897H22.8814C23.4828 15.7897 24.0075 15.3549 24.1288 14.7559L25.9101 5.96349C25.9876 5.58063 25.8928 5.1871 25.6499 4.88404ZM22.8814 14.4946H6.87012L5.08895 5.70226L24.6626 5.70231L22.8814 14.4946Z"
                    />
                    <g class="text-pink-400">
                      <circle
                        cx="25"
                        cy="4.89023"
                        r="4"
                        class="fill-current dot"
                      />
                    </g>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- END: Header -->

    <!-- START: BreadCrumb -->
    <section class="bg-gray-100 py-8 px-4">
      <div class="container mx-auto">
        <ul class="breadcrumb">
          <li>
            <a href="/">Home</a>
          </li>
          <li>
            <a href="#" aria-label="current-page">Shopping Cart</a>
          </li>
        </ul>
      </div>
    </section>
    <!-- END: BreadCrumb -->

    <!-- START: Congrats -->
    <!-- END: Congrats -->
    <section class="py-4 md:py-16">
      <div class="container mx-auto min-h-screen px-4">
        <div class="flex flex-col items-center justify-center">
          <div class="w-full md:w-4/12 text-center">
            <img
              src="./images/content/ilustration-success.png"
              alt="ilustration success"
            />
            <h2 class="text-3xl font-semibold mb-6">Ah yes it’s success!</h2>
            <p class="text-lg mb-12">
              Furniture yang anda beli akan kami kirimkan saat ini juga so now
              please sit tight and be ready for it
            </p>
            <a
              href="/"
              class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 inline-block transition duration-200"
              >Back to Shop</a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- START: Aside Menu / Footer -->
    <section>
      <div class="border-b border-t border-gray-200 py-12 px-4">
        <div class="flex justify-center mb-8">
          <img
            src="images/design/logo.svg"
            alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
          />
        </div>
        <aside class="container mx-auto">
          <div class="flex flex-wrap md:space-x-4 justify-center">
            <!-- START: item aside menu 1 -->
            <div class="w-full md:w-2/12 mb-4 md:mb-0 accourdion">
              <h5 class="text-xl font-semibold mb-2 relative">Overview</h5>
              <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                <li>
                  <a href="#" class="hover:underline py-1 block">Shipping</a>
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block">Refund</a>
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block">Promotion</a>
                </li>
              </ul>
            </div>
            <!-- END: item aside menu 1 -->

            <!-- START: item aside menu 2 -->
            <div class="w-full md:w-2/12 mb-4 md:mb-0 accourdion">
              <h5 class="text-xl font-semibold mb-2 relative">Company</h5>
              <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                <li>
                  <a href="#" class="hover:underline py-1 block">About</a>
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block">Career</a>
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block">Contact Us</a>
                </li>
              </ul>
            </div>
            <!-- END: item aside menu 2 -->

            <!-- START: item aside menu 3 -->
            <div class="w-full md:w-2/12 mb-4 md:mb-0 accourdion">
              <h5 class="text-xl font-semibold mb-2 relative">Explore</h5>
              <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                <li>
                  <a href="#" class="hover:underline py-1 block"
                    >Terms & Conds</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block"
                    >Privacy Policy</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:underline py-1 block"
                    >For Developer</a
                  >
                </li>
              </ul>
            </div>
            <!-- END: item aside menu 3 -->

            <!-- START: item aside menu 4 -->
            <div class="w-full md:w-3/12 mb-4 md:mb-0">
              <h5 class="text-xl font-semibold mb-2 relative">
                Spesial Letter
              </h5>
              <form action="#">
                <label class="relative w-full">
                  <input
                    type="text"
                    class="bg-gray-100 rounded-xl py-3 px-5 w-full focus:outline-none"
                    placeholder="Your email adress"
                  />
                  <button class="bg-pink-400 absolute rounded-xl right-0 p-3">
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-current text-white"
                    >
                      <path
                        d="M23.6177 0.411971C23.6163 0.410624 23.6152 0.409187 23.6138 0.407839C23.6124 0.406492 23.6109 0.405414 23.6095 0.404157C23.236 0.049307 22.7002 -0.0573008 22.2098 0.126411L0.833871 8.13353C0.268743 8.34518 -0.0623361 8.87521 0.0098048 9.4523C0.0821332 10.0294 0.53462 10.4694 1.13589 10.547L11.5833 11.8968C11.6028 11.8994 11.6185 11.9143 11.6212 11.9332L13.0301 21.9417C13.1112 22.5177 13.5704 22.9512 14.1729 23.0204C14.2279 23.0268 14.2824 23.0298 14.3364 23.0298C14.8735 23.0298 15.3486 22.7229 15.5495 22.231L23.9077 1.75274C24.0994 1.28302 23.9882 0.76983 23.6177 0.411971ZM1.30534 9.34475C1.2819 9.34169 1.27136 9.34039 1.26728 9.30788C1.26325 9.27537 1.27319 9.27159 1.29508 9.26347L21.2946 1.77187L11.9404 10.7333C11.8794 10.7163 1.30534 9.34475 1.30534 9.34475ZM14.37 21.7892C14.3614 21.8102 14.358 21.8198 14.3236 21.8158C14.2897 21.8119 14.2883 21.8017 14.2852 21.7794C14.2852 21.7794 12.8535 11.6495 12.8358 11.5911L22.19 2.62972L14.37 21.7892Z"
                      />
                    </svg>
                  </button>
                </label>
              </form>
            </div>
            <!-- END: item aside menu 4 -->
          </div>
        </aside>
      </div>
    </section>
    <!-- END: Aside Menu / Footer -->

    <!-- START: Footer -->
    <footer class="flex text-center px-4 py-8 justify-center">
      <p class="text-sm">
        Copyright 2021 • All Rights Reserved LuxSpace by Lukman Harun
      </p>
    </footer>
    <!-- END: Footer -->

    {{-- utils class --}}
		<script src="js/utils-class.js"></script>
		{{-- menu toggler --}}
		<script src="js/menu-toggler.js"></script>
    {{-- accourdion khusus pengguna handphone --}}
    <script src="js/accourdion.js"></script>
  </body>
</html>