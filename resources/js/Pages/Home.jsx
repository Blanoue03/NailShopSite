
import { useState } from 'react';
import Layout from '@/Layouts/Layout';

export default function Home({products}) {
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
                            At Matt's Nails, creativity meets precision. Founded by Matthew Haug during the COVID-19 pandemic, what began as a small creative outlet quickly grew into a unique custom nail art business. Each design is carefully crafted to reflect individuality, style, and attention to detail, turning simple nails into personalized works of art.
                        </p>
                        <p className="leading-relaxed">
                            Whether you’re looking for bold statement pieces, subtle elegance, or something completely one-of-a-kind, Haug Custom Nails offers designs tailored to your vision. Every set is created with care, combining artistic creativity with a commitment to quality.
                        </p>
                        <p className="leading-relaxed">
                            What started as a passion project has evolved into a small business dedicated to helping clients express themselves through custom nail designs—because no two styles should ever be the same.
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
                            {products.map((product, index) => (
                                <div
                                    key={index}
                                    className={`slide${index === currentSlide ? ' active' : ''}`}
                                >
                                    <img src={`/images/${product.image}`} className="w-full h-full object-cover" />
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
