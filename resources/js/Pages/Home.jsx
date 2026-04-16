
import { useState, useRef, useEffect } from 'react';
import Layout from '@/Layouts/Layout';

export default function Home({ products }) {
    const [currentSlide, setCurrentSlide] = useState(0);
    const [touchStartX, setTouchStartX] = useState(0);
    const [descExpanded, setDescExpanded] = useState(false);
    const [isMobile, setIsMobile] = useState(false);
    const galleryRef = useRef(null);

    useEffect(() => {
        const check = () => setIsMobile(window.innerWidth < 900);
        check();
        window.addEventListener('resize', check);
        return () => window.removeEventListener('resize', check);
    }, []);

    const slidesPerView = isMobile ? 1 : 2;
    const slidePercent = isMobile ? 100 : 50;

    const showSlide = (n) => {
        const maxSlide = products.length - slidesPerView;
        if (n < 0) setCurrentSlide(maxSlide);
        else if (n > maxSlide) setCurrentSlide(0);
        else setCurrentSlide(n);
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

    const scrollToGallery = () => {
        galleryRef.current?.scrollIntoView({ behavior: 'smooth' });
    };

    const dotCount = products.length - slidesPerView + 1;

    // Split images into two rows for the scrolling background
    const allImages = products.map(p => p.image);
    const half = Math.ceil(allImages.length / 2);
    const topRow = allImages.slice(0, half);
    const bottomRow = allImages.slice(half);

    return (
        <main className="page-fade-in">

            {/* ── Hero Section ──────────────────────────────── */}
            <section className="hero">
                {/* Background scrolling rows */}
                <div className="hero-bg">
                    <div className="hero-row hero-row-top">
                        <div className="hero-row-track">
                            {/* Duplicate images for seamless loop */}
                            {[...topRow, ...topRow].map((img, i) => (
                                <img key={i} src={`/images/${img}`} alt="" className="hero-row-img" />
                            ))}
                        </div>
                    </div>
                    <div className="hero-row hero-row-bottom">
                        <div className="hero-row-track">
                            {[...bottomRow, ...bottomRow].map((img, i) => (
                                <img key={i} src={`/images/${img}`} alt="" className="hero-row-img" />
                            ))}
                        </div>
                    </div>
                </div>

                {/* Dark overlay */}
                <div className="hero-overlay" />

                {/* Content */}
                <div className="hero-content">
                    <h1 className="hero-title">Matt's Nails</h1>
                    <p className="hero-tagline">
                        Creativity meets precision
                    </p>

                    {/* Description — desktop: fully visible, mobile: collapsible */}
                    <div className={`hero-desc ${descExpanded ? 'expanded' : ''}`}>
                        <p>
                            At Matt's Nails, creativity meets precision. Founded by Matthew Haug during the COVID-19 pandemic, what began as a small creative outlet quickly grew into a unique custom nail art business. Each design is carefully crafted to reflect individuality, style, and attention to detail.
                        </p>
                        <p>
                            Whether you're looking for bold statement pieces, subtle elegance, or something completely one-of-a-kind, every set is created with care, combining artistic creativity with a commitment to quality.
                        </p>
                        <p>
                            What started as a passion project has evolved into a small business dedicated to helping clients express themselves through custom nail designs — because no two styles should ever be the same.
                        </p>
                    </div>

                    {/* Mobile expand arrow */}
                    <button
                        className="hero-expand-btn"
                        onClick={() => setDescExpanded(prev => !prev)}
                        aria-label={descExpanded ? 'Collapse description' : 'Expand description'}
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="28"
                            height="28"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            className={`hero-expand-icon ${descExpanded ? 'rotated' : ''}`}
                        >
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </button>

                    <button className="hero-cta" onClick={scrollToGallery}>
                        View Gallery
                    </button>
                </div>
            </section>

            {/* ── Photo Gallery Section ────────────────────── */}
            <section ref={galleryRef} className="max-w-7xl mx-auto px-8 py-12">
                <h2 className="gallery-title">Gallery</h2>
                <div className="page-box">
                    <div className="relative">

                        {/* Slideshow */}
                        <div
                            className="slideshow"
                            onTouchStart={handleTouchStart}
                            onTouchEnd={handleTouchEnd}
                        >
                            <div
                                className="slideshow-track"
                                style={{ transform: `translateX(-${currentSlide * slidePercent}%)` }}
                            >
                                {products.map((product, index) => (
                                    <div key={index} className="slide">
                                        <img src={`/images/${product.image}`} className="w-full h-full object-cover" />
                                    </div>
                                ))}
                            </div>

                            <button className="slide-arrow prev" onClick={() => showSlide(currentSlide - 1)}>&#8592;</button>
                            <button className="slide-arrow next" onClick={() => showSlide(currentSlide + 1)}>&#8594;</button>
                        </div>

                        {/* Dots */}
                        <div className="slide-dots">
                            {Array.from({ length: dotCount }).map((_, index) => (
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
