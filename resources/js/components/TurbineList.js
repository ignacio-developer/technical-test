import React, { useEffect, useState } from 'react';

const TurbinesList = () => {
    const [turbines, setTurbines] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        // Fetch turbines with their components
        fetch('/api/turbines')
            .then((response) => response.json())
            .then((data) => {
                setTurbines(data); // Store turbines data in state
                setLoading(false); // Stop the loading indicator
            })
            .catch((error) => {
                console.error('Error fetching turbines:', error);
                setLoading(false); // Handle error by stopping loading
            });
    }, []);

    if (loading) {
        return <div>Loading turbines...</div>;
    }

    if (turbines.length === 0) {
        return <div>No turbines found.</div>;
    }

    return (
        <div className="p-4">
            <h2 className="text-xl font-bold">Turbines List</h2>
            <ul className="mt-4 space-y-6">
                {turbines.map((turbine) => (
                    <li
                        key={turbine.id}
                        className="p-6 border rounded-lg bg-white shadow-md"
                    >
                        <h3 className="text-lg font-semibold">Turbine: {turbine.name}</h3>
                        <div className="mt-4">
                            <h4 className="font-medium">Components:</h4>
                            <ul className="mt-2 pl-4 list-disc">
                                {turbine.components.map((component) => (
                                    <li key={component.id} className="mt-1">
                                        {component.name}
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default TurbinesList;
