<section id="contact" class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                {{ lang('Hubungi Kami', 'Contact Us') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                {{ lang('Kami siap membantu kebutuhan peralatan laboratorium Anda', 'We are ready to help with your laboratory equipment needs') }}
            </p>
        </div>
        
        <div class="flex justify-center">
            <form id="waForm" class="space-y-4 w-full max-w-md">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ lang('Nama Lengkap', 'Full Name') }}
                    </label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:focus:ring-secondary focus:border-transparent dark:bg-gray-700">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ lang('Pesan', 'Message') }}
                    </label>
                    <textarea id="message" name="message" rows="4" required 
                              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:focus:ring-secondary focus:border-transparent dark:bg-gray-700"></textarea>
                </div>
                <button type="submit" 
                        class="bg-primary dark:bg-secondary hover:bg-blue-700 dark:hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 w-full">
                    {{ lang('Kirim Pesan', 'Send Message') }} <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </form>
        </div>
    </div>
</section>

<script>
document.getElementById('waForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = encodeURIComponent(document.getElementById('name').value);
    const message = encodeURIComponent(document.getElementById('message').value);
    const waNumber = '6289611700011'; // format internasional tanpa +
    const waUrl = `https://wa.me/${waNumber}?text=Halo%20saya%20${name},%0A${message}`;
    window.open(waUrl, '_blank');
});
</script>
