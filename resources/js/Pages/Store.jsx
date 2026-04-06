
import { Link } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

/*const products = [
    { id: 1, name: "PRODUCT 1", price: 25.00, description: "[Nail polish or product description]" },
    { id: 2, name: "PRODUCT 2", price: 30.00, description: "[Nail polish or product description]" },
    { id: 3, name: "PRODUCT 3", price: 35.00, description: "[Nail polish or product description]" },
    { id: 4, name: "PRODUCT 4", price: 40.00, description: "[Nail polish or product description]" },
    { id: 5, name: "PRODUCT 5", price: 28.00, description: "[Nail polish or product description]" },
    { id: 6, name: "PRODUCT 6", price: 32.00, description: "[Nail polish or product description]" },
];*/

export default function Store({ products }) {
    return (
        <main className="max-w-7xl mx-auto px-8 py-12 page-fade-in">
            <div className="mb-6 uppercase tracking-wider border-b-2 border-black pb-2">
                STORE
            </div>

            {/* Product Grid */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {products.map(product => (
                    <Link
                        key={product.id}
                        href={route('store.show', product.id)}
                        className="border-2 border-black p-6 flex flex-col hover:bg-black hover:text-white transition-colors"
                    >
                        {/* Product Image Placeholder */}
                        <div className="aspect-square border-2 border-black flex items-center justify-center mb-4">
                            <div className="text-center opacity-50">
                                [PRODUCT IMAGE]
                            </div>
                        </div>

                        {/* Product Details */}
                        <div className="flex-1">
                            <div className="uppercase tracking-wider mb-2">{product.name}</div>
                            <div className="text-sm mb-3 opacity-75">{product.description}</div>
                            <div className="mb-4">
                                <span className="uppercase tracking-wider">PRICE: </span>
                                <span>${product.price.toFixed(2)}</span>
                            </div>
                        </div>

                        {/* View Details Indicator */}
                        <div className="text-sm uppercase tracking-wider text-center opacity-75 mt-2">
                            [CLICK FOR DETAILS]
                        </div>
                    </Link>
                ))}
            </div>
        </main>
    );
}

Store.layout = (page) => <Layout>{page}</Layout>;
