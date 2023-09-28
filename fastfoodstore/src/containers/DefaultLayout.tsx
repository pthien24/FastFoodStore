import * as React from "react";
import { Route, Routes, useNavigate } from "react-router-dom";
import Footer from "./layouts/Footer";
import Header from "./layouts/Header";
import Menu from "../pages/Menu";
import About from "../pages/About";
import Home from "../pages/Home";
import Contact from "../pages/Contact";
import News from "../pages/News";
import Demo from "../pages/Demo";
import Product from "../pages/Product";
import Cart from "../pages/Cart";
import ShoppingCart from "@mui/icons-material/ShoppingCart";
import { RootState } from "../store";
import { useSelector } from "react-redux";
import { CartItem } from "../store/reducers/carSlice";
import "./layout.css";
const DefaultLayout = () => {
  const cart = useSelector((state: RootState) => state.cart);
  const navigate = useNavigate();

  const getTotalQuantity = () => {
    let total = 0;
    cart.forEach((item: CartItem) => {
      total += item.quantity;
    });
    return total;
  };
  return (
    <>
      <Header />
      <Routes>
        <Route path="" element={<Home />}></Route>
        <Route path="/home" element={<Home />}></Route>
        <Route path="/about" element={<About />}></Route>
        <Route path="/menu" element={<Menu />}></Route>
        <Route path="/menu2" element={<Demo />}></Route>
        <Route path="/news" element={<News />}></Route>
        <Route path="/cart" element={<Cart />}></Route>
        <Route path="/menu/:id" element={<Product />}></Route>
        <Route path="/contact" element={<Contact />}></Route>
      </Routes>
      <div className="shopping-cart" onClick={() => navigate("/cart")}>
        <ShoppingCart id="cartIcon" />
        <p>{getTotalQuantity() || 0}</p>
      </div>
      <Footer />
    </>
  );
};

export default DefaultLayout;
