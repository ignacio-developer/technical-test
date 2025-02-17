import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import HomePage from './components/HomePage';
import TurbineList from './components/TurbineList';
import InspectionList from './components/InspectionList';
import NavigationBar from './components/NavigationBar'; // Import NavigationBar
import InspectionEdit from './components/InspectionEdit';
import InspectionNew from './components/InspectionNew';

const App = () => {
    return (
        <Router>
            <div className="min-h-screen bg-gray-100">
                {/* Add the NavigationBar here */}
                <NavigationBar />
                
                <div className="container mx-auto px-6 py-8 mt-20">
				    <Routes>
				        <Route path="/" element={<HomePage />} />
				        <Route path="/turbines" element={<TurbineList />} />
				        <Route path="/inspections" element={<InspectionList />} />
                        <Route path="/inspections/edit/:id" element={<InspectionEdit />} />
                        <Route path="/inspections/new" element={<InspectionNew />} />
                        /inspections/new
				    </Routes>
				</div>

            </div>
        </Router>
    );
};

ReactDOM.render(<App />, document.getElementById('app'));
