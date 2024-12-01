import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom'; // Use useNavigate here

const EditInspection = () => {
    const { id } = useParams(); // Get the inspection ID from the URL params
    const navigate = useNavigate(); // For redirecting after saving
    const [inspection, setInspection] = useState(null);
    const [updatedGrades, setUpdatedGrades] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        // Fetch the inspection data based on the inspection ID
        fetch(`/api/inspections/${id}`)
            .then((response) => response.json())
            .then((data) => {
                setInspection(data);
                // Initialize updatedGrades with the current grades
                const initialGrades = data.components.reduce((acc, component) => {
                    acc[component.id] = component.pivot.grade;
                    return acc;
                }, {});
                setUpdatedGrades(initialGrades);
                setLoading(false);
            })
            .catch((error) => {
                console.error('Error fetching inspection:', error);
                setLoading(false);
            });
    }, [id]);

    const handleGradeChange = (componentId, grade) => {
        setUpdatedGrades((prev) => ({
            ...prev,
            [componentId]: grade,
        }));
    };

    const handleSaveGrades = () => {
        // Save the updated grades (Optionally send to the server)
        fetch(`/api/inspections/${id}/update-grades`, {
            method: 'PUT',
            body: JSON.stringify({ grades: updatedGrades }),
            headers: { 'Content-Type': 'application/json' },
        })
            .then((response) => response.json())
            .then(() => {
                // Redirect to inspections list page after saving
                navigate('/inspections'); // This is where we use navigate() instead of history.push()
            })
            .catch((error) => {
                console.error('Error saving grades:', error);
            });
    };

    if (loading) {
        return <div>Loading inspection...</div>;
    }

    return (
        <div className="p-4">
            <h2 className="text-xl font-bold">Edit Inspection</h2>
            <h3 className="mt-4 text-lg font-semibold">Inspection for: {inspection.turbine.name}</h3>

            <div className="mt-4">
                <h4 className="font-medium">Inspected Components:</h4>
                <ul className="mt-2 pl-4 list-disc">
                    {inspection.components.map((component) => (
                        <li key={component.id} className="mt-1">
                            <strong>{component.name}:</strong>
                            <select
                                value={updatedGrades[component.id]}
                                onChange={(e) =>
                                    handleGradeChange(component.id, e.target.value)
                                }
                                className="ml-2 border rounded"
                            >
                                {[1, 2, 3, 4, 5].map((grade) => (
                                    <option key={grade} value={grade}>
                                        {grade}
                                    </option>
                                ))}
                            </select>
                        </li>
                    ))}
                </ul>
            </div>

            <button
                onClick={handleSaveGrades}
                className="mt-4 px-4 py-2 bg-blue-500 text-white rounded"
            >
                Save All Grades
            </button>
        </div>
    );
};

export default EditInspection;
