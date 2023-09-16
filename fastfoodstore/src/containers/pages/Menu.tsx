import * as React from "react";
import { useState, useEffect } from "react";
import img from "../../assets/img/products/17-whopper-b_-t_m-ph_-mai-c_-l_n.jpg";
import Breadcrumb from "../../components/Breadcrumb";
import axios from "axios";
const Menu = () => {
  const [productData, setProductData] = useState([]);

  useEffect(() => {
    // Define the API endpoint you want to fetch data from
    const apiUrl = "https://api.example.com/products";

    // Fetch data from the API
    axios
      .get(apiUrl)
      .then((response) => {
        // Assuming the API response is an array of products
        setProductData(response.data);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }, []);
  return (
    <>
      <Breadcrumb title={"Menu"} />
      <div className="product-section mt-150 mb-150">
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <div className="product-filters">
                <ul>
                  <li className="active" data-filter="*">
                    All
                  </li>
                  <li data-filter=".Burger">Burger</li>
                  <li data-filter=".GàRán">Gà Rán</li>
                  <li data-filter=".Pizza">Pizza</li>
                  <li data-filter=".Bít Tết">Bít Tết</li>
                  <li data-filter=".TrángMiệng">Tráng Miệng</li>
                  <li data-filter=".NướcUống">Nước Uống</li>
                </ul>
              </div>
            </div>
          </div>

          <div>
            <div className="row product-lists">
              <div className="col-lg-4 col-md-6 text-center Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Tẩm Phô Mai(cỡ vừa)</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 63.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Nướng Phô Mai</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 48.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Nướng WROPPER JR</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 54.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger cá</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 48.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Nướng Hành Chiên</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 50.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Gà Phô Mai Sốt BBQ</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 48.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
            </div>
            <div className="row product-lists">
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Gà Giòn Cay</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 77.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Gà Nướng</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 77.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Thịt Heo Xông Khói</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 67.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Tẩm Phô Mai(cỡ lớn)</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 126.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger Bò Nướng Phô Mai Thịt Heo Xông Khói WROPPER</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 146.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 text-center  Burger">
                <div className="single-product-item">
                  <div className="product-image">
                    <a href="single-product.html">
                      <img src={img} />
                    </a>
                  </div>
                  <h3>Burger 2 Miếng Bò Nướng</h3>
                  <p className="product-price">
                    <span>tính theo số lượng 1</span> 175.000đ{" "}
                  </p>
                  <a href="cart.html" className="cart-btn">
                    <i className="fas fa-shopping-cart" />
                    Thêm Giỏ Hàng
                  </a>
                </div>
              </div>
            </div>
            <div className="row">
              <div className="col-lg-12 text-center">
                <div className="pagination-wrap">
                  <ul>
                    <li>
                      <a href="shop.html">Start</a>
                    </li>
                    <li>
                      <a href="#">Prev</a>
                    </li>
                    <li>
                      <a className="active">1</a>
                    </li>
                    <li>
                      <a href="shop2.html">2</a>
                    </li>
                    <li>
                      <a href="shop3.html">3</a>
                    </li>
                    <li>
                      <a href="shop2.html">Next</a>
                    </li>
                    <li>
                      <a href="shop6.html">End</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Menu;
