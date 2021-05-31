<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::updateOrCreate(['name' => 'backend-sidebar', 'description' => 'This is backend sidebar', 'deletable' => false]);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 1, 'divider_title' => 'Menus']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 2, 'title' => 'Dashboard', 'url' => "/app/dashboard", 'icon_class' => 'pe-7s-rocket']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 3, 'title' => 'Pages', 'url' => "/app/pages", 'icon_class' => 'pe-7s-news-paper']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 4, 'divider_title' => 'Access Control']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 5, 'title' => 'Roles', 'url' => "/app/roles", 'icon_class' => 'pe-7s-check']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 6, 'title' => 'Users', 'url' => "/app/users", 'icon_class' => 'pe-7s-users']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 7, 'title' => 'Kyc', 'url' => "/app/kycs", 'icon_class' => 'pe-7s-users']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 8, 'divider_title' => 'Wallet Control']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 9, 'title' => 'Deposits', 'url' => "/app/deposits", 'icon_class' => 'pe-7s-angle-down-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 10, 'title' => 'Withdraws', 'url' => "/app/withdraws", 'icon_class' => 'pe-7s-angle-up-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 11, 'title' => 'Buy Order', 'url' => "/app/buys", 'icon_class' => 'pe-7s-angle-up-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 12, 'title' => 'Sell Order', 'url' => "/app/sells", 'icon_class' => 'pe-7s-angle-down-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 13, 'title' => 'Payment Method', 'url' => "/app/payment-methods", 'icon_class' => 'pe-7s-angle-down-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 14, 'title' => 'Currency', 'url' => "/app/currency", 'icon_class' => 'pe-7s-angle-down-circle']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 15, 'divider_title' => 'Trade Control']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 16, 'title' => 'All Offers', 'url' => "/app/offers", 'icon_class' => 'pe-7s-angle-down-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 17, 'title' => 'All Trades', 'url' => "/app/trades", 'icon_class' => 'pe-7s-angle-up-circle']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 18, 'title' => 'Dispute Trades', 'url' => "/app/dispute-trades", 'icon_class' => 'pe-7s-angle-up-circle']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 19, 'divider_title' => 'System']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 20, 'title' => 'Menus', 'url' => "/app/menus", 'icon_class' => 'pe-7s-menu']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 21, 'title' => 'Backups', 'url' => "/app/backups", 'icon_class' => 'pe-7s-cloud']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 22, 'title' => 'Settings', 'url' => "/app/settings/general", 'icon_class' => 'pe-7s-settings']);
    }
}
