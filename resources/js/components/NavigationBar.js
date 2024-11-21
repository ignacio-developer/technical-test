import React from 'react';
import { Link } from 'react-router-dom';

const NavigationBar = () => {
    return (
        <nav className="bg-blue-600 text-white py-4 shadow-md fixed w-full z-10 top-0 left-0">
            <div className="container mx-auto flex justify-between items-center px-6">
                <div className="text-lg font-semibold">
                    <Link to="/" className="hover:text-gray-200">
                        Wind Farm App
                    </Link>
                </div>
                <div className="space-x-4">
                    <Link
                        to="/"
                        className="hover:bg-blue-700 px-4 py-2 rounded-md transition"
                    >
                        Home
                    </Link>
                    <Link
                        to="/turbines"
                        className="hover:bg-blue-700 px-4 py-2 rounded-md transition"
                    >
                        List Turbines
                    </Link>
                    <Link
                        to="/inspections"
                        className="hover:bg-blue-700 px-4 py-2 rounded-md transition"
                    >
                        List Inspections
                    </Link>
                </div>
            </div>
        </nav>
    );
};

export default NavigationBar;
