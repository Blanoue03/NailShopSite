// resources/js/Pages/Contact.jsx
import { useForm, usePage } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function Contact() {
    const { orderType, productId, productName, productPrice } = usePage().props;

    const hasOrder = !!productId;

    const { data, setData, post, processing } = useForm({
        name: '',
        email: '',
        message: orderType === 'custom'
            ? '[Please describe your custom order requirements here...]'
            : '',
        order_type: orderType || null,
        product_id: productId || null,
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('contact.send'));
    };

    const socialPlatforms = [
        { name: 'FACEBOOK',  placeholder: 'F'  },
        { name: 'INSTAGRAM', placeholder: 'IG' },
        { name: 'TWITTER',   placeholder: 'X'  },
        { name: 'TIKTOK',    placeholder: 'TT' },
    ];

    return (
        <main className="max-w-3xl mx-auto px-8 py-12 page-fade-in">
            <div className="page-heading mb-6">
                CONTACT
            </div>

            {/* Order Summary - shown if arriving from a product page */}
            {hasOrder && (
                <div className="page-box-compact mb-8" style={{ backgroundColor: 'var(--pink-light)' }}>
                    <div className="mb-4 uppercase tracking-wider text-sm">
                        {orderType === 'now' ? 'ORDER SUMMARY' : 'CUSTOM ORDER REQUEST'}
                    </div>
                    <div className="space-y-2">
                        <div>
                            <span className="uppercase tracking-wider text-sm">PRODUCT: </span>
                            <span>{productName}</span>
                        </div>
                        <div>
                            <span className="uppercase tracking-wider text-sm">PRICE: </span>
                            <span>${parseFloat(productPrice).toFixed(2)}</span>
                        </div>
                        {orderType === 'custom' && (
                            <div className="mt-2 text-sm opacity-75">
                                [Please describe your customization requirements in the message field below]
                            </div>
                        )}
                    </div>
                </div>
            )}

            {/* Contact Form */}
            <div className="page-box mb-12">
                <div className="mb-6 uppercase tracking-wider text-sm">
                    SEND US A MESSAGE
                </div>
                <div className="mb-4 text-sm opacity-75">
                    [Email will be sent to: placeholder@nailsalon.com]
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">

                    {/* Name */}
                    <div>
                        <label htmlFor="name" className="block uppercase tracking-wider text-sm mb-2">
                            NAME
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value={data.name}
                            onChange={e => setData('name', e.target.value)}
                            required
                            className="form-input"
                            placeholder="[Your Name]"
                        />
                    </div>

                    {/* Email */}
                    <div>
                        <label htmlFor="email" className="block uppercase tracking-wider text-sm mb-2">
                            EMAIL
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            required
                            className="form-input"
                            placeholder="[your.email@example.com]"
                        />
                    </div>

                    {/* Message */}
                    <div>
                        <label htmlFor="message" className="block uppercase tracking-wider text-sm mb-2">
                            MESSAGE
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            value={data.message}
                            onChange={e => setData('message', e.target.value)}
                            required
                            rows={6}
                            className="form-textarea"
                            placeholder="[Your message here...]"
                        />
                    </div>

                    {/* Submit */}
                    <button
                        type="submit"
                        disabled={processing}
                        className="w-full px-6 py-3 rounded-lg uppercase tracking-wider transition-colors disabled:opacity-50 hover:bg-pink-200"
                        style={{ border: '1.5px solid var(--border)' }}
                    >
                        {hasOrder ? 'CONFIRM ORDER' : 'SEND MESSAGE'}
                    </button>

                </form>
            </div>

            {/* Social Media */}
            <div className="page-box">
                <div className="mb-6 uppercase tracking-wider text-sm text-center">
                    FOLLOW US ON SOCIAL MEDIA
                </div>
                <div className="flex justify-center gap-4 flex-wrap">
                    {socialPlatforms.map(platform => (
                        <button
                            key={platform.name}
                            className="w-16 h-16 rounded-full transition-colors flex items-center justify-center uppercase tracking-wider text-sm hover:bg-pink-200"
                            style={{ border: '1.5px solid var(--border)' }}
                            aria-label={platform.name}
                        >
                            {platform.placeholder}
                        </button>
                    ))}
                </div>
            </div>

        </main>
    );
}

Contact.layout = (page) => <Layout>{page}</Layout>;
