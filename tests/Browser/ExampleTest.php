<?php

namespace Tests\Browser;

use App\Models\Products;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class ExampleTest extends DuskTestCase
{
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            // '--disable-gpu'
            // '--headless'
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
    }
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

        $this->browse(function (Browser $browser) {
            $browser->maximize()
                ->visit('/home') //首頁
                ->assertSee('Ragnarok Online Card Store')
                ->pause(1000)
                ->click('@share-short-url-link')//分享網址
                ->pause(1000)
                ->click('@copy-button')
                ->pause(1000)
                ->acceptDialog()
                ->pause(1000)
                ->click('@notification-link')//通知
                ->pause(1000)
                ->click('@new-notification_0')
                ->waitFor('@readed-notification')
                ->pause(1000)
                ->click('@admin-link') //商品管理
                ->pause(1000)
                ->click('@import-product')
                ->pause(1000)
                ->waitFor('@import-file')
                ->attach('products_import', 'D:/下載2/products_import.xlsx')
                ->pause(1000)
                ->click('@products-import-submit')
                ->pause(1000)
                ->scrollIntoView('@page_3')
                ->pause(1000)
                ->click('@page_3')
                ->pause(1000)
                ->scrollIntoView("@product_Osiris")
                ->pause(1000)
                ->click('@Osiris-upload-image')
                ->pause(1000)
                ->attach('product_image', 'C:/Users/USER/Desktop/ro_card/Osiris_Card.png')
                ->click('@upload-image-submit')
                ->scrollIntoView("@product_Osiris")
                ->pause(1000)
                ->click('@order-link') //Components訂單管理
                ->pause(1000)
                ->click('@order_0')
                ->waitFor('@order_content_0')
                ->pause(1000);
            eval(\Psy\sh());
        });
    }
}
