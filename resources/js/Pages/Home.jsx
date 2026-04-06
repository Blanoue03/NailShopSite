
import { useState } from 'react';
import Layout from '@/Layouts/Layout';

export default function Home() {
    const [currentSlide, setCurrentSlide] = useState(0);
    const [touchStartX, setTouchStartX] = useState(0);

    const totalSlides = 6;

    const showSlide = (n) => {
        setCurrentSlide((n + totalSlides) % totalSlides);
    };

    const handleTouchStart = (e) => {
        setTouchStartX(e.changedTouches[0].screenX);
    };

    const handleTouchEnd = (e) => {
        const touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 50) {
            showSlide(currentSlide + 1);
        } else if (touchEndX - touchStartX > 50) {
            showSlide(currentSlide - 1);
        }
    };

    const slides = [
        'PHOTO 1', 'PHOTO 2', 'PHOTO 3',
        'PHOTO 4', 'PHOTO 5', 'PHOTO 6',
    ];

    return (
        <main className="max-w-7xl mx-auto px-8 py-12 page-fade-in">

            {/* Company Description Section */}
            <section className="mb-16">
                <div className="border-2 border-black p-8">
                    <div className="mb-4 uppercase tracking-wider">COMPANY DESCRIPTION</div>
                    <div className="space-y-4">
                        <p className="leading-relaxed">
                            [Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.]
                        </p>
                        <p className="leading-relaxed">
                            [Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.]
                        </p>
                    </div>
                </div>
            </section>

            {/* Photo Gallery Section */}
            <section>
                <div className="mb-6 uppercase tracking-wider border-b-2 border-black pb-2">
                    PHOTO EXAMPLES GALLERY
                </div>
                <div className="border-2 border-black p-8">
                    <div className="relative">

                        {/* Slideshow */}
                        <div
                            className="slideshow"
                            onTouchStart={handleTouchStart}
                            onTouchEnd={handleTouchEnd}
                        >
                            {slides.map((label, index) => (
                                <div
                                    key={index}
                                    className={`slide${index === currentSlide ? ' active' : ''}`}
                                >
                                    <div className="text-center">
                                        <div className="uppercase tracking-wider mb-2">{label}</div>
                                        <div className="opacity-50">[Nail Example]</div>
                                    </div>
                                </div>
                            ))}

                            <button className="slide-arrow prev" onClick={() => showSlide(currentSlide - 1)}>←</button>
                            <button className="slide-arrow next" onClick={() => showSlide(currentSlide + 1)}>→</button>
                        </div>

                        {/* Dots */}
                        <div className="slide-dots">
                            {slides.map((_, index) => (
                                <span
                                    key={index}
                                    onClick={() => showSlide(index)}
                                    className={`slide-dot${index === currentSlide ? ' active' : ''}`}
                                />
                            ))}
                        </div>

                    </div>
                </div>
            </section>

        </main>
    );
}

Home.layout = (page) => <Layout>{page}</Layout>;
