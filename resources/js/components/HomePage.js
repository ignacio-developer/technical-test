import React from 'react';
import { Link } from 'react-router-dom';

const HomePage = () => {
    return (
        <div className="text-center mt-20">
            <h2 className="text-4xl font-bold text-blue-600">Welcome to the Wind Farm App!</h2>
            <p className="mt-4 text-lg text-gray-700">Use the navigation links to view the turbines and their inspections.</p>
            
            <div className="mt-8">
                <Link
                    to="/turbines"
                    className="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-700"
                >
                    List Turbines
                </Link>
                <Link
                    to="/inspections"
                    className="ml-4 bg-green-500 text-white py-2 px-6 rounded-full hover:bg-green-700"
                >
                    List Inspections
                </Link>
            </div>
        </div>
    );
};

export default HomePage;
