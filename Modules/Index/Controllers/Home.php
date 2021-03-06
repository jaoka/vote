<?php
/**
 * @filesource Modules/Index/Controllers/Home.php
 *
 * @copyright 2018 Goragod.com
 * @license https://somtum.kotchasan.com/license/
 *
 * @see https://somtum.kotchasan.com/
 */

namespace Index\Home;

use App\Login;
use Somtum\Http\Request;

/**
 * Controller สำหรับแสดงหน้าเว็บ.
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Controller extends \Somtum\Controller
{
    /**
     * Controller สำหรับแสดงหน้าเว็บไซต์
     * ให้ผลลัพท์เป็น HTML.
     *
     * @param Request $request
     */
    public function render(Request $request)
    {
        // ไตเติล, เมนู
        $this->title = 'ผลโหวต ตามเวลาจริง';
        $this->menu = 'vote';
        // สมาชิก
        if (Login::isMember()) {
            $content = '<section>';
            // breadcrumbs
            $content .= '<div class="breadcrumbs"><ul>';
            $content .= '<li><span class="icon-like">โหวต</span></li>';
            $content .= '<li><span>ผลโหวต</span></li>';
            $content .= '</ul></div>';
            $content .= '<header><h1 class="icon-clock">'.$this->title.'</h1></header>';
            // แสดงตาราง
            $content .= file_get_contents(ROOT_PATH.'skin/'.self::$cfg->skin.'/home.html');
            $content .= '</section>';

            return $content;
        }
        // 404

        return \Index\Error\Controller::execute($this);
    }
}
