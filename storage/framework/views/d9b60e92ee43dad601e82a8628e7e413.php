<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="<?php echo e(asset('asset/images/1.PNG')); ?>" rel="icon" type="image/png">

    <!-- title and description-->
    <title>COACHING 360</title>
    <meta name="description" content="Gestion des non conformités, incidents et réclamations">

    <!-- css files -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/tailwind.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>

  <div class="sm:flex">

    <div class="relative lg:w-[580px] md:w-96 w-full p-10 min-h-screen shadow-xl flex items-center pt-10 dark:bg-slate-900 z-10" style='background:#0f172a;'>

      <div class="w-full lg:max-w-sm mx-auto space-y-10" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">

        <!-- logo image-->
        <a href="#"> <img src="<?php echo e(asset('asset/images/logo.PNG')); ?>" class="w-28 absolute top-10 left-10 dark:hidden" alt=""></a>
        <a href="#"> <img src="<?php echo e(asset('asset/images/logo.PNG')); ?>" class="w-28 absolute top-10 left-10 hidden dark:!block" alt=""></a>

        <!-- logo icon optional -->
        <div class="hidden">
          <img class="w-12" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="Socialite html template">
        </div>

        <!-- title -->
        <div>
          <h2 style='color:#fff!important' class="text-2xl font-semibold mb-1.5"> Connectez-vous à votre compte </h2>
        </div>

        <!-- form -->
         <?php echo $__env->yieldContent('content'); ?>


      </div>

    </div>

    <!-- image slider -->
    <div class="flex-1 relative bg-primary max-md:hidden">


      <div class="relative w-full h-full" tabindex="-1" uk-slideshow="animation: slide; autoplay: true">

        <ul class="uk-slideshow-items w-full h-full">
            <li class="w-full">
                <img src="<?php echo e(asset('asset/images/post/6.png')); ?>"  alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                    <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"  uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" >
                        <img class="w-12" src="<?php echo e(asset('asset/images/logo-icon.png')); ?>" alt="Socialite html template">
                        <h4 class="!text-white text-2xl font-semibold mt-7"  uk-slideshow-parallax="y: 600,0,0"> </h4>
                        <p class="!text-white text-lg mt-7 leading-8"  uk-slideshow-parallax="y: 800,0,0;"> Accéder au système de gestion des non-conformités, incidents et réclamations. Votre contribution est essentielle pour améliorer nos services et assurer la qualité.

</p>
                    </div>
                </div>
                <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
            </li>
            <li class="w-full">
              <img src="<?php echo e(asset('asset/images/post/2.jpg')); ?>"  alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
              <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                  <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"  uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" >
                      <img class="w-12" src="<?php echo e(asset('asset/images/logo-icon.png')); ?>" alt="Socialite html template">
                      <h4 class="!text-white text-2xl font-semibold mt-7"  uk-slideshow-parallax="y: 800,0,0"></h4>
                      <p class="!text-white text-lg mt-7 leading-8"  uk-slideshow-parallax="y: 800,0,0;"> Libérez votre potentiel en adoptant une mentalité de croissance. Chaque défi est une opportunité d'apprentissage, alors avancez avec confiance. Ensemble, transformons vos rêves en réalité !</p>
                  </div>
              </div>
              <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
          </li>
        </ul>

        <!-- slide nav -->
        <div class="flex justify-center">
            <ul class="inline-flex flex-wrap justify-center  absolute bottom-8 gap-1.5 uk-dotnav uk-slideshow-nav"> </ul>
        </div>


    </div>


    </div>

  </div>


    <!-- Uikit js you can use cdn  https://getuikit.com/docs/installation  or fine the latest  https://getuikit.com/docs/installation -->
    <script src="<?php echo e(asset('asset/js/uikit.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/script.js')); ?>"></script>

    <!-- Ion icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <!-- Dark mode -->
      <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
        } else {
        document.documentElement.classList.remove('dark')
        }

        // Whenever the user explicitly chooses light mode
        localStorage.theme = 'light'

        // Whenever the user explicitly chooses dark mode
        localStorage.theme = 'dark'

        // Whenever the user explicitly chooses to respect the OS preference
        localStorage.removeItem('theme')
    </script>

</body>
</html>
<?php /**PATH C:\laragon\www\coaching\resources\views/layouts/auth.blade.php ENDPATH**/ ?>