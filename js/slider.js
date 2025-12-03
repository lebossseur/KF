// Slider pour KF Business & Informatique
class HeroSlider {
    constructor() {
        this.currentSlide = 0;
        this.slides = document.querySelectorAll('.slider-item');
        this.totalSlides = this.slides.length;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 5000; // 5 secondes

        if (this.totalSlides > 0) {
            this.init();
        }
    }

    init() {
        // Créer les contrôles du slider
        this.createControls();
        this.createDots();

        // Afficher le premier slide
        this.showSlide(0);

        // Démarrer le défilement automatique
        this.startAutoPlay();

        // Ajouter les événements
        this.addEventListeners();
    }

    createControls() {
        const slider = document.querySelector('.hero-slider');

        // Bouton précédent
        const prevBtn = document.createElement('button');
        prevBtn.className = 'slider-control prev';
        prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevBtn.setAttribute('aria-label', 'Slide précédent');

        // Bouton suivant
        const nextBtn = document.createElement('button');
        nextBtn.className = 'slider-control next';
        nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextBtn.setAttribute('aria-label', 'Slide suivant');

        slider.appendChild(prevBtn);
        slider.appendChild(nextBtn);
    }

    createDots() {
        const slider = document.querySelector('.hero-slider');
        const dotsContainer = document.createElement('div');
        dotsContainer.className = 'slider-dots';

        for (let i = 0; i < this.totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'slider-dot';
            dot.setAttribute('aria-label', `Aller au slide ${i + 1}`);
            dot.dataset.slide = i;
            dotsContainer.appendChild(dot);
        }

        slider.appendChild(dotsContainer);
    }

    addEventListeners() {
        // Boutons de navigation
        document.querySelector('.slider-control.prev')?.addEventListener('click', () => {
            this.prevSlide();
        });

        document.querySelector('.slider-control.next')?.addEventListener('click', () => {
            this.nextSlide();
        });

        // Dots
        document.querySelectorAll('.slider-dot').forEach(dot => {
            dot.addEventListener('click', (e) => {
                const slideIndex = parseInt(e.target.dataset.slide);
                this.goToSlide(slideIndex);
            });
        });

        // Pause au survol
        const slider = document.querySelector('.hero-slider');
        slider.addEventListener('mouseenter', () => this.stopAutoPlay());
        slider.addEventListener('mouseleave', () => this.startAutoPlay());

        // Navigation au clavier
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
        });

        // Support touch/swipe pour mobile
        this.addSwipeSupport();
    }

    addSwipeSupport() {
        const slider = document.querySelector('.hero-slider');
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        });

        const handleSwipe = () => {
            if (touchEndX < touchStartX - 50) {
                this.nextSlide(); // Swipe left
            }
            if (touchEndX > touchStartX + 50) {
                this.prevSlide(); // Swipe right
            }
        };

        this.handleSwipe = handleSwipe;
    }

    showSlide(index) {
        // Masquer tous les slides
        this.slides.forEach(slide => {
            slide.classList.remove('active');
        });

        // Mettre à jour les dots
        document.querySelectorAll('.slider-dot').forEach(dot => {
            dot.classList.remove('active');
        });

        // Afficher le slide actuel
        this.slides[index].classList.add('active');
        document.querySelectorAll('.slider-dot')[index]?.classList.add('active');

        this.currentSlide = index;
    }

    nextSlide() {
        let next = this.currentSlide + 1;
        if (next >= this.totalSlides) {
            next = 0;
        }
        this.goToSlide(next);
    }

    prevSlide() {
        let prev = this.currentSlide - 1;
        if (prev < 0) {
            prev = this.totalSlides - 1;
        }
        this.goToSlide(prev);
    }

    goToSlide(index) {
        this.stopAutoPlay();
        this.showSlide(index);
        this.startAutoPlay();
    }

    startAutoPlay() {
        this.stopAutoPlay();
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDelay);
    }

    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
}

// Initialiser le slider au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
});
