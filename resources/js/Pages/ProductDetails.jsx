
import { router, Link } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function ProductDetails({ product }) {

    if (!product || product == undefined) {
        return (
            <main className="max-w-7xl mx-auto px-8 py-12 page-fade-in">
                <div className="page-box text-center">
                    <div className="uppercase tracking-wider mb-4">PRODUCT NOT FOUND</div>
                    <Link
                        href={route('store')}
                        className="inline-block rounded-lg px-8 py-2 hover:bg-pink-200 transition-colors uppercase tracking-wider"
                        style={{ border: '1.5px solid var(--border)' }}
                    >
                        BACK TO STORE
                    </Link>
                </div>
            </main>
        );
    }

    const handleOrderNow = () => {
        router.visit(route('contact'), {
            data: {
                orderType: 'now',
                productId: product.id,
                productName: product.name,
                productPrice: product.price,
            }
        });
    };

    const handleCustomOrder = () => {
        router.visit(route('contact'), {
            data: {
                orderType: 'custom',
                productId: product.id,
                productName: product.name,
                productPrice: product.price,
            }
        });
    };

    console.log(product)
    return (
        <main className="max-w-4xl mx-auto px-8 py-12 page-fade-in">

            {/* Back Button */}
            <div className="mb-6">
                <Link
                    href={route('store')}
                    className="rounded-lg px-6 py-2 hover:bg-pink-200 transition-colors uppercase tracking-wider text-sm"
                    style={{ border: '1.5px solid var(--border)' }}
                >
                    ← BACK TO STORE
                </Link>
            </div>

            <div className="page-box">

                {/* Product Image */}
                <div className="aspect-square rounded-lg flex items-center justify-center mb-8 overflow-hidden" style={{ border: '1.5px solid var(--border)' }}>
                    <img src={`/images/${product.image}`} className="w-full h-full object-cover" />
                </div>

                {/* Product Information */}
                <div className="mb-8">
                    <div className="uppercase tracking-wider mb-2 text-2xl">{product.name}</div>
                    <div className="mb-4">
                        <span className="uppercase tracking-wider">PRICE: </span>
                        <span className="text-xl">${parseFloat(product.price).toFixed(2)}</span>
                    </div>
                    <div className="pt-4 mt-4" style={{ borderTop: '1.5px solid var(--border)' }}>
                        <div className="uppercase tracking-wider text-sm mb-2">DESCRIPTION</div>
                        <p className="leading-relaxed">{product.long_description}</p>
                    </div>
                </div>

                {/* Action Buttons */}
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button
                        onClick={handleOrderNow}
                        className="rounded-lg px-8 py-4 hover:bg-pink-200 transition-colors uppercase tracking-wider"
                        style={{ border: '1.5px solid var(--border)' }}
                    >
                        ORDER NOW
                    </button>
                    <button
                        onClick={handleCustomOrder}
                        className="rounded-lg px-8 py-4 hover:bg-pink-200 transition-colors uppercase tracking-wider"
                        style={{ border: '1.5px solid var(--border)' }}
                    >
                        CREATE CUSTOM ORDER
                    </button>
                </div>

                <div className="mt-4 text-sm text-center opacity-75">
                    [Both options will take you to the contact page to complete your order]
                </div>

            </div>
        </main>
    );
}

ProductDetails.layout = (page) => <Layout>{page}</Layout>;
