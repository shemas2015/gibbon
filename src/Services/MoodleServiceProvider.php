<?php
/*
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

namespace Gibbon\Services;

use Gibbon\Services\Moodle\MoodleService;
use Gibbon\Services\Moodle\MoodleConnection;
use Gibbon\Domain\System\SettingGateway;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * DI Container Services for Moodle Integration
 *
 * @version v25
 * @since   v25
 */
class MoodleServiceProvider extends AbstractServiceProvider
{
    /**
     * The provides array is a way to let the container know that a service
     * is provided by this service provider. Every service that is registered
     * via this service provider must have an alias added to this array or
     * it will be ignored.
     *
     * @var array
     */
    protected $provides = [
        MoodleService::class,
        MoodleConnection::class,
    ];

    /**
     * This is where the magic happens, within the method you can
     * access the container and register or retrieve anything
     * that you need to, but remember, every alias registered
     * within this method must be declared in the `$provides` array.
     */
    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(MoodleConnection::class, function () use ($container) {
            $settingGateway = $container->get(SettingGateway::class);
            
            return new MoodleConnection([
                'moodleUrl' => $settingGateway->getSettingByScope('System', 'moodleUrl'),
                'moodleToken' => $settingGateway->getSettingByScope('System', 'moodleToken'),
                'moodleTimeout' => $settingGateway->getSettingByScope('System', 'moodleTimeout', 30),
            ]);
        });

        $container->share(MoodleService::class, function () use ($container) {
            return new MoodleService($container->get(MoodleConnection::class));
        });
    }
}