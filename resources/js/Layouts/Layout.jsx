import { Link } from '@inertiajs/react';
import { useState } from 'react';

export default function Layout({ children }) {
    const [menuOpen, setMenuOpen] = useState(false);

    return (
        <div className="site-wrapper">

            {/* Header */}
            <header className="site-header">
                <div className="inner">

                    {/* Desktop */}
                    <div className="nav-desktop">
                        <Link href={route('home')} className="nav-logo">
                            Company Logo
                        </Link>
                        <nav className="nav-links">
                            <Link href={route('store')}   className="nav-link">Store</Link>
                            <Link href={route('contact')} className="nav-link">Contact</Link>
                        </nav>
                    </div>

                    {/* Mobile */}
                    <div className="nav-mobile">
                        <Link href={route('home')} className="nav-logo">
                            Company Logo
                        </Link>
                        <button
                            className="hamburger"
                            onClick={() => setMenuOpen(o => !o)}
                            aria-label="Toggle menu"
                        >
                            {menuOpen ? '✕' : '☰'}
                        </button>
                        {menuOpen && (
                            <div className="mobile-dropdown">
                                <Link href={route('store')}   onClick={() => setMenuOpen(false)}>Store</Link>
                                <Link href={route('contact')} onClick={() => setMenuOpen(false)}>Contact</Link>
                            </div>
                        )}
                    </div>

                </div>
            </header>

            {/* Page Content */}
            <main className="page-fade-in">
                {children}
            </main>

        </div>
    );
}
