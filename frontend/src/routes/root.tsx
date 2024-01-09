import React from 'react';
import { Routes, Route } from 'react-router';

import Index from '../views/Index';
import Hotel from '../views/Hotel';

const AppRouter: React.FC = () => {
    return (
        <Routes>
            <Route
                path="/"
                element={<Index />}
            />
            <Route
                path="/hotels"
                element={<Index />}
            />
            <Route
                path="/hotels/:id"
                element={<Hotel />}
            />
        </Routes>
    );
}

export default AppRouter;