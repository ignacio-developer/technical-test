import React, { useEffect, useState } from 'react';

const ComponentList2 = (props) => {

	const components = props.components;

	console.log("ComponentList2", components);

	return (
		<div>
			<h1>Components List 2:</h1>
				<ul>
					{components.map((component) => (
						<li key="component.id">
							{component.name}
						</li>
					))}
				</ul>
		</div>
		);

}

export default ComponentList2;