class ArticleTest extends TestCase
{
    // setUp 每執行一次 test case 前都會執行
    // 可以用來初始化資料庫並重新建立待測試物件
    // 以免被其他 test case 影響測試結果
    public function setUp()
    {
        // 一定要先呼叫，建立 Laravel Service Container 以便測試
        parent::setUp();

        // 每次都要初始化資料庫
        $this->initDatabase();
    }

    // tearDown 會在每個 test case 結束後執行
    // 可以用來重置相關環境
    public function tearDown()
    {
        // 結束一個 test case 都要重置資料庫
        $this->resetDatabase();
    }
}
