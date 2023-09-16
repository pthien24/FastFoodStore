import * as React from "react";
import { Route, Routes } from "react-router-dom";

import Footer from "./layouts/Footer";
import Header from "./layouts/Header";
import Home from "./pages/Home";
import Menu from "./pages/Menu";
const DefaultLayout = () => {
  return (
    <>
      <Header />
      <Routes>
        <Route path="" element={<Home />}></Route>
        <Route path="/home" element={<Home />}></Route>
        <Route path="/menu" element={<Menu />}></Route>
      </Routes>
      <Footer />
    </>
  );
};

export default DefaultLayout;
