import * as React from "react";
import { Link } from "react-router-dom";
import logo from "../../assets/img/logo.png";
const Header = () => {
  return (
    <div className="top-header-area" id="sticker">
      <div className="container">
        <div className="row">
          <div className="col-lg-12 col-sm-12 text-center">
            <div className="main-menu-wrap">
              {/* logo */}
              <div className="site-logo">
                <a href="index_2.html">
                  <img src={logo} alt="logo" />
                </a>
              </div>
              {/* logo */}
              {/* menu start */}
              <nav className="main-menu">
                <ul>
                  <li className="current-list-item">
                    <a href="index_2.html">Trang Chủ</a>
                  </li>
                  <li>
                    <a href="about.html">Giới Thiệu</a>
                  </li>
                  <li>
                    <a href="sale.html">Khuyến Mãi-Combo</a>
                  </li>
                  <li>
                    <a href="news.html">Tin Tức</a>
                  </li>
                  <li>
                    <a href="contact.html">Liên Hệ</a>
                  </li>
                  <li>
                    <Link to="/menu">Thực Đơn</Link>
                  </li>
                  <li>
                    <div className="header-icons">
                      <a className="shopping-cart" href="cart.html">
                        <i className="fas fa-shopping-cart" />
                      </a>
                      <a className="mobile-hide search-bar-icon" href="#">
                        <i className="fas fa-search" />
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
              <a className="mobile-show search-bar-icon" href="#">
                <i className="fas fa-search" />
              </a>
              <div className="mobile-menu" />
              {/* menu end */}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Header;
