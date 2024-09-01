<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained('parties')->onDelete('cascade');
            $table->date('invoice_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->text('item_description')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('cgst_rate', 5, 2)->nullable();
            $table->decimal('sgst_rate', 5, 2)->nullable();
            $table->decimal('igst_rate', 5, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->decimal('sgst_amount', 10, 2)->nullable();
            $table->decimal('net_amount', 10, 2)->nullable();
            $table->string('declaration')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gst_bills');
    }
};
