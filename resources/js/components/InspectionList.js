import React, { useEffect, useState } from 'react';
import moment from 'moment';
import ComponentList2 from './ComponentList2'; // Import ComponentList2


const InspectionList = () => {
    const [inspections, setInspections] = useState([]);
    const [loading, setLoading] = useState(true);
    const [components, setComponents] = useState([]);

    useEffect(() => {
        // Fetch inspections with turbine and component data
        fetch('/api/inspections')
            .then((response) => response.json())
            .then((data) => {
                setInspections(data);
                //console.log(data);
                // Extract and flatten components
                const componentsList = data.flatMap(
                    (inspection) => inspection.components
                );
                console.log(componentsList);
                setComponents(componentsList);
                // Update the state
                //setComponents((prevComponents) => [...prevComponents, ...allComponents]);
                //setComponents(data[components]); // Store inspections data in state
                setLoading(false);   // Stop the loading indicator
            })
            .catch((error) => {
                console.error('Error fetching inspections:', error);
                setLoading(false);   // Handle error by stopping loading
            });
    }, []);

    if (loading) {
        return <div>Loading inspections...</div>;
    }

    if (inspections.length === 0) {
        return <div>No inspections found.</div>;
    }

    return (
        <div>
            <div className="p-4">
                <ComponentList2 components={components} />
            </div>
            <div className="p-4">
                <h2 className="text-xl font-bold">Turbine Inspections</h2>
                <ul className="mt-4 space-y-6">
                    {inspections.map((inspection) => (
                        <li
                            key={inspection.id}
                            className="p-6 border rounded-lg bg-white shadow-md"
                        >
                            <h3 className="text-lg font-semibold">
                                Inspection for: {inspection.turbine.name}
                            </h3>

                            <p className="text-sm text-gray-600">Inspection Date: {moment(inspection.created_at, "YYYY-MM-DD hh:mm:ss+ZZ").format("DD/MM/YYYY")}</p>
                            <div className="mt-4">
                                <h4 className="font-medium">Inspected Components:</h4>
                                <ul className="mt-2 pl-4 list-disc">
                                    {inspection.components.map((component) => (
                                        <li key={component.id} className="mt-1">
                                            <strong>{component.name}:</strong> Grade{' '}
                                            <span
                                                className={`${
                                                    component.pivot.grade === 5
                                                        ? 'text-red-600'
                                                        : component.pivot.grade >= 3
                                                        ? 'text-yellow-500'
                                                        : 'text-green-600'
                                                } font-bold`}
                                            >
                                                {component.pivot.grade}
                                            </span>
                                        </li>
                                    ))}
                                </ul>



                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    );
};

export default InspectionList;
