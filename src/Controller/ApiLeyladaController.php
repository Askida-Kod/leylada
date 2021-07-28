<?php
namespace GreenCheap\Leylada\Controller;

use GreenCheap\Application as App;
use GreenCheap\Blog\Model\Categories;

class ApiLeyladaController
{
    protected $blogModule;

    public function __construct()
    {
        $this->blogModule = App::module("blog");
    }

    /**
     * @Route(methods="GET")
     * @Request(csrf=true)
     */
    public function getBlogsCategoriesAction()
    {
        if (!$this->blogModule) {
            return App::jsonabort(404, __("Not Found Blog Module"));
        }

        $query = Categories::query();

        $query->where(["status = :status", "date < :date"], ["status" => Categories::getStatus("STATUS_PUBLISHED"), "date" => new \DateTime()]);
        $categories = $query->get();

        return compact("categories");
    }
}
?>
