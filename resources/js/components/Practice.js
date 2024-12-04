/**
import React, { useEffect, useState } from 'react';

const Practice = () => {

	useEffect(() => {

		fetch('/api/inspections')
		.then((response) => response.json())
		.then((data) => {
			setNewPractice(data);
		})
		.catch((error) => console.log(error))


	}, []);

	return (
		<h1></h1>
	);

}

export default Practice;
**/