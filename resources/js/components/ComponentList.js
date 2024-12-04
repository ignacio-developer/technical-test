/**
import React, { useEffect, useState } from 'react';

const ComponentList = () => {

	const components = (props) => {

	};
	const [components, setComponents] = useState([]);

	return (

		<ul>
			{inspection.components.map((component) => {
				<li >
					<span>{component.name}</span>
				</li>
			})}
		</ul>


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
	);


}

export ComponentList;
*/