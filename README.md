## Ice Cream Shop Project

Date created: October 8th, 2016
    By: Spencer
Date revised: October 8th, 2016
    By: Spencer


This project is done by Group #11 for Assignment #1 in COMP-4711.

Breakdown:

Models:
    Our models are broken down for receiving/stock, recipes, sales, and a sales log.
    Supplies is what deals with our receiving and the stock that we contain on hand.
    Recipe is what deals with of the items that go into creating each product and so will tie in with the Product(sales)
    and the Product(sales) models.
    Product is the model that deals with the selling of each of the 'recipes' and handles the cost and if the item is on
    promotion or not.
    SalesLog is used for writing to receipts.

Controllers:
    Our controllers are broken down similar to our models for receiving, recipes/production, and sales.
    The Production controller is used to display all of the recipes, as well as the method for showing the specific recipe
    and checking if there is enough stock to create the item.
    Receiving is used to handle the data of our stock and for receiving an item and looking them up.
    Sales is used to sell the recipes and to list a menu of what we have, as well as specific details for each menu item
    and the cost of everything.

Views:
    Our views folder has subfolders that are named based off of which controller will be accessing them and the views
    that are necessary to display the content to the users of the site.