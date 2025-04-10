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


## Email Notification System

### User Model Updates
- Implemented `MustVerifyEmail` interface: Ensures users verify their email addresses before full account access

### AppServiceProvider Updates
- Modified `boot()` method: Customizes the email verification notification with a subject, message, and action button linking to the verification URL

### New Components
- Added `OrderConfirmation` Mailable: A new class in `app/Mail` to handle order confirmation email structure and content
- Added `emails/order_confirmation.blade.php`: Email template displaying ordered products, quantities, and total price

### ProductController Updates
- Updated `makeOrder()`: Sends an email notification to the user upon successful order creation

### Functionality
- **Email Verification**: New users receive an email with a verification link to confirm their email address
- **Password Reset**: When a user clicks "Forgot Password," an email is sent with a link to reset their password, followed by automatic login upon successful reset
- **Order Confirmation**: When an order is placed, an email is sent immediately with order details (products, quantities, total price)


## Social Login Integration

### New Components
- Added `SocialiteController`: A new controller in `app/Http/Controllers` to manage GitHub login flow:
  - `redirectToProvider()`: Initiates the GitHub OAuth redirect
  - `handleProviderCallback()`: Processes the callback, logs in existing users, or registers new users with GitHub data
  - Added Socialite routes in `web.php`: 
    - `/{provider}/redirect`: Redirects users to GitHub for authentication
    - `/{provider}/callback`: Handles the callback from GitHub to log in or register users

### Login Page Updates
- Modified `login.blade.php`: Added a "Sign in with GitHub" button

### Service Configuration Updates
- Updated `config/services.php`: Added GitHub configuration with client ID, client secret, and redirect URL for OAuth integration

### Environment Configuration
- Updated `.env`: Added `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` for GitHub OAuth credentials

### Functionality
- **GitHub Login**: Users can log in or sign up using their GitHub account
  - If the email exists, logs in the user
  - If new, creates a user with GitHub name, email, and provider details, then logs them in
- Redirects to dashboard with a success message after authentication