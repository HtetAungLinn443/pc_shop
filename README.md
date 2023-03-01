# PC Shop

PC Shop is a web project that allows users to browse and purchase computer-related products online. It includes two panels: an Admin panel and a User panel.

## Installation

To install PC Shop, you need to follow these steps:
- Clone the repository from GitHub to your local machine.
- Install Laravel and Juststream using Composer.
- Create a database and configure your .env file accordingly.
- Run the database migrations using Laravel's Artisan CLI.
- Seed the database with sample data using Laravel's Artisan CLI.

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=pc_shop_project
  DB_USERNAME=root
  DB_PASSWORD=    
```

## Usage
To use PC Shop, you can follow these steps:
- Launch the application using a web browser.
- Log in using your credentials as either an admin or a user.
- Navigate to the relevant pages depending on whether you are an admin or a user.

### Admin Panel

The Admin panel includes the following features:
- Dashboard: Displays a summary of important information about the site.
- User List: Displays a list of all registered users on the site.
- Category List: Allows the admin to manage categories of products.
- Product List: Allows the admin to manage products.
- Settings: Allows the admin to manage various site settings.
- Profile Edit: Allows the admin to edit their own profile information.
- Account Change Role: Allows the admin to change a user's role from admin to user, or vice versa.
- Reply to User Contact Message: Allows the admin to reply to messages sent by users through the site's contact form.

### User Panel
- The User panel includes the following features:
- Find Products: Allows the user to search for products on the site.
- View Product Details: Allows the user to view details about a specific product.
- Add to Cart: Allows the user to add products to their cart for later purchase.
- Order History: Allows the user to view their order history.
- Edit Profile and Password: Allows the user to edit their own profile information.

## Contributing

If you wish to contribute to PC Shop, you can fork the repository and make any changes you deem necessary. Once you have made your changes, you can create a pull request to have your changes reviewed and merged into the main branch.
