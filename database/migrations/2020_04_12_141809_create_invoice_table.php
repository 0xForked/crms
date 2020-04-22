<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('view');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('invoice_template_id')->nullable();

            $table->date('invoice_date');  // tanggal invoice
            $table->date('due_date');  //batas waktu invoice

            $table->string('invoice_number'); //nomor invoice
            $table->string('reference_number')->nullable(); // masih blm tau

            $table->enum('status', [
                "GENERATED", // default dibuat perlu disortir lagi
                'NOTIFIED', // diberitahu sudah selesai di sortir dirikim ke customer
                'PROCEED', // sendang proses, menunggu pembayaran dari customer
                'PAID' // dibayar tahapan telah selesai
            ])->default('GENERATED');

            $table->string('tax_per_item');
            $table->string('discount_per_item');
            $table->string('discount_type')->nullable();
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('discount_val')->nullable(); // discount
            $table->unsignedBigInteger('sub_total'); // subtotal
            $table->unsignedBigInteger('total'); // (discount_val - sub_total)
            $table->unsignedBigInteger('tax'); // tax total
            $table->unsignedBigInteger('due_amount'); // (total - tax)

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('invoice_template_id')
                ->references('id')
                ->on('invoice_templates');
        });


        Schema::create('invoices_has_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_templates');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoices_has_projects');
    }
}
