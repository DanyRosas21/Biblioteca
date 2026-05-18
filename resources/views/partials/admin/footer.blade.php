<!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-book-open text-2xl text-blue-400"></i>
                        <h3 class="text-xl font-bold">Biblioteca Central</h3>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Comprometidos con la educación y la cultura desde 1985.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#inicio" class="hover:text-white transition-colors">Inicio</a></li>
                        <li><a href="#libros" class="hover:text-white transition-colors">Libros</a></li>
                        <li><a href="#servicios" class="hover:text-white transition-colors">Servicios</a></li>
                        <li><a href="#nosotros" class="hover:text-white transition-colors">Nosotros</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Horario de Atención</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>Lunes a Viernes: 8:00 - 20:00</li>
                        <li>Sábados: 9:00 - 18:00</li>
                        <li>Domingos: 10:00 - 14:00</li>
                        <li>Feriados: Cerrado</li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Síguenos</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Biblioteca Central. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Menú móvil toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Smooth scroll para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Cerrar menú móvil si está abierto
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
        
        // Manejo del formulario de contacto
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.');
                contactForm.reset();
            });
        }
        
        // Manejo del newsletter
        const newsletterForms = document.querySelectorAll('.hero-gradient form');
        newsletterForms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('¡Gracias por suscribirte! Recibirás nuestras novedades en tu correo.');
                form.reset();
            });
        });
        
        // Animación al hacer scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);
        
        // Observar secciones
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
    </html>