<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductVariatonStockView extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		DB::statement("
            CREATE OR REPLACE VIEW  product_variation_stock_view AS
                SELECT
                    variations.product_id as product_id,
                    variations.id as variation_id,
                    COALESCE(SUM(stocks.quantity) - COALESCE(SUM(product_variation_orders.quantity), 0), 0) as stock,
                    case when COALESCE( SUM(stocks.quantity) - COALESCE(SUM(product_variation_orders.quantity), 0), 0) > 0
                        then true
                        else false
                    end in_stock
                FROM variations

                LEFT JOIN(
                    SELECT
                        stocks.variation_id as id,
                        SUM(stocks.quantity) as quantity
                    FROM stocks
                    GROUP BY stocks.variation_id
                ) as stocks USING(id)

                LEFT JOIN(
                    SELECT
                        product_variation_orders.variation_id AS id,
                        SUM(product_variation_orders.quantity) as quantity
                    FROM product_variation_orders
                    GROUP BY product_variation_orders.variation_id
                ) AS product_variation_orders USING (id)

                GROUP BY variations.id
        ");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		DB::statement("DROP VIEW  product_variation_stock_view");
	}
}
