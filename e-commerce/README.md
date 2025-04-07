# E-commerce project

This document outlines the modifications made to an existing Laravel 11 e-commerce project built with PHP. The changes enhance the cart and wishlist functionality to improve user experience.

## Cart Modifications

### ProductController Updates
- Added `updateCart()`: Updates product quantities and prices in the cart
- Added `removeFromCart()`: Removes individual items from the cart
- Added `clearCart()`: Clears the entire cart

### Cart Page Updates
- Added quantity controls (+/- buttons) with automatic price updates
- Added individual item removal buttons
- Added clear cart button
- Added total price display

## Wishlist Modifications

### HomeController Updates
- Added `removeFromWishlist()`: Removes individual items from wishlist
- Added `clearWishlist()`: Clears entire wishlist

### Home Page Updates
- Enhanced the wishlist button to dynamically toggle between "Add to Wishlist" and "Remove from Wishlist" states.