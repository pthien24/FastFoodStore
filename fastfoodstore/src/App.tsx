import React from "react";
import "./App.css";

import { Route, Routes } from "react-router-dom";
import DefaultLayout from "./containers/DefaultLayout";

function App() {
  return (
    <>
      <Routes>
        <Route path="/*" element={<DefaultLayout />}></Route>
      </Routes>
      {/* <Header />
      <Home />
      <Footer /> */}
    </>
  );
}

export default App;
