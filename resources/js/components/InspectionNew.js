import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom'; // Use useNavigate here

const TurbinesList = () => {
    const [turbines, setTurbines] = useState([]);
    const [selectedTurbine, setSelectedTurbine] = useState('');
    const [grades, setGrades] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        // Fetch turbines with their components
        fetch('/api/turbines')
            .then((response) => response.json())
            .then((data) => {
                setTurbines(data);
                console.log(data);
                setLoading(false); // Stop the loading indicator
            })
            .catch((error) => {
                console.error('Error fetching turbines:', error);
                setLoading(false); // Handle error by stopping loading
            });
    }, []);


    const handleSubmit = (e) => {
    	e.preventDefault();
    	console.log(e);

    	const payload = {
    		turbine_id: turbine.id,
    		components: turbine.components.map((component) => ({
    			id: component.id,
    			grade: grades[component.id] || 0,
    		}))
    	};

    	console.log(payload);

    	fetch('/api/inspections', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then((response) => response.json())
        .then((data) => {
        	console.log(data);
        	//redirect to /inspections
        	navigate('/inspections');
        })
        .catch((error) => {
        	console.log("Error saving the inspections:", error);
        });
    }

    if (loading) {
        return <div>Loading turbines and form...</div>;
    }

    if (turbines.length === 0) {
        return <div>No turbines found.</div>;
    }

	return (
		<div className="p-4">
			<h1>New Inspection</h1>
			<form onSubmit={handleSubmit} className="space-y-4 mt-4">
	            <div>
	                <label htmlFor="turbine" className="block font-medium">
	                    Select Turbine:
	                </label>
	                <select
	                    id="turbine"
	                    value={selectedTurbine}
	                    onChange={(e) => setSelectedTurbine(e.target.value)}
	                    className="mt-1 p-2 border rounded w-full"
	                >
	                    <option value="">-- Choose Turbine --</option>
	                    {turbines.map((turbine) => (
	                        <option key={turbine.id} value={turbine.id}>
	                            {turbine.name}
	                        </option>
	                    ))}
	                </select>
	            </div>


	            {selectedTurbine && (
                    <div>
                        <h3 className="font-medium">Grade Components:</h3>
                        {turbines
                            .find((turbine) => turbine.id === selectedTurbine)
                            .components.map((component) => (
                                <div key={component.id} className="mt-2">
                                    <label className="block">{component.name}:</label>
                                    <input
                                        type="number"
                                        min="0"
                                        max="5"
                                        value={grades[component.id] || ''}
                                        onChange={(e) =>
                                            setGrades((prev) => ({
                                                ...prev,
                                                [component.id]: parseInt(e.target.value, 10),
                                            }))
                                        }
                                        className="mt-1 p-2 border rounded w-full"
                                    />
                                </div>
                            ))}
                    </div>
                )}



	            <button
	                    type="submit"
	                    className="px-4 py-2 bg-blue-500 text-white rounded"
	                >
	                    Save Inspection
	            </button>
	        </form>
        </div>
		);


    };

export default TurbinesList;

