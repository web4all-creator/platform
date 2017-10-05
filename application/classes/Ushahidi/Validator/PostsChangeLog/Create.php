<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi CSV Validator
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

use Ushahidi\Core\Tool\Validator;
use Ushahidi\Core\Entity\UserRepository;

class Ushahidi_Validator_PostsChangeLog_Create extends Validator
{
    protected $user_repo;
    protected $default_error_source = 'postschangelog';

    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    protected function getRules()
    {
        return [
            'id' => [
                ['numeric'],
            ],
            'user_id' => [
                ['numeric'],
                [[$this->user_repo, 'exists'], [':value']],
            ],

        ];
    }

}
