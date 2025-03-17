<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
<a href="<?= base_url('home') ?>" class="text-2xl font-bold text-gray-800">ReadFlow</a>
    <ul class="hidden md:flex space-x-6 text-gray-700">
        <li><a href="<?= base_url('home') ?>" class="hover:text-blue-500">Home</a></li>
        <li><a href="<?= base_url('bookmark') ?>" class="hover:text-blue-500">Bookmark</a></li>
        <li><a href="<?= base_url('forum') ?>" class="hover:text-blue-500">Forum</a></li>
        <li><a href="<?= base_url('kategori') ?>" class="hover:text-blue-500">Kategori</a></li>
        <li><a href="<?= base_url('about') ?>" class="hover:text-blue-500">Tentang</a></li>
        <li><a href="<?= base_url('contact') ?>" class="hover:text-blue-500">Kontak</a></li>
    </ul>
    <a href="<?= base_url('login') ?>" class="hidden md:block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Login</a>

    <!-- Mobile Menu Button -->
    <button class="md:hidden text-gray-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
</nav>
