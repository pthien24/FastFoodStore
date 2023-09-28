import { createSlice, PayloadAction } from "@reduxjs/toolkit";

// Define the IProduct interface
export interface IProduct {
  id: number;
  title: string;
  price: number;
  description: string;
  image: string;
  category_id: number;
  created_at: string;
  updated_at: string;
}

// Define the CartItem interface that extends IProduct and adds a quantity property
export interface CartItem extends IProduct {
  quantity: number;
}

// Define the CartState interface with an array of CartItem
export interface CartState {
  cart: CartItem[];
}

const cartSlice = createSlice({
  name: "cart",
  initialState: {
    cart: [] as CartItem[],
  },
  reducers: {
    addToCart: (state, action: PayloadAction<IProduct>) => {
      const itemInCart = state.cart.find(
        (item) => item.id === action.payload.id
      );
      if (itemInCart) {
        itemInCart.quantity++;
      } else {
        state.cart.push({ ...action.payload, quantity: 1 });
      }
    },
    incrementQuantity: (state, action: PayloadAction<number>) => {
      const item = state.cart.find((item) => item.id === action.payload);
      if (item) {
        item.quantity++;
      }
    },
    decrementQuantity: (state, action: PayloadAction<number>) => {
      const item = state.cart.find((item) => item.id === action.payload);
      if (item) {
        if (item.quantity === 1) {
          item.quantity = 1;
        } else {
          item.quantity--;
        }
      }
    },
    removeItem: (state, action: PayloadAction<number>) => {
      const updatedCart = state.cart.filter(
        (item) => item.id !== action.payload
      );
      state.cart = updatedCart;
    },
  },
});

export const cartReducer = cartSlice.reducer;
export const { addToCart, incrementQuantity, decrementQuantity, removeItem } =
  cartSlice.actions;
