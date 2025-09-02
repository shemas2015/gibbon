<p align="center">
    <a href="https://gibbonedu.org/" target="_blank"><img width="200" src="https://gibbonedu.org/img/gibbon-logo.png"></a><br>
    Gibbon is a flexible, open source school management platform designed <br>
    to make life better for teachers, students, parents and schools.
</p>

------

Gibbon Core
===========
The Core repository represents the bulk of Gibbon, including all of its primary functionality. The core can be extended through the use of modules and themes, which are provided separately. See the [Extend](https://gibbonedu.org/extend/) page for more info.

Gibbon is open source, and maintained for the benefit of teachers, students, parents and schools.

## Documentation

For full documentation, visit [docs.gibbonedu.org](https://docs.gibbonedu.org).

## Installation & Support

For installation instructions, visit [Getting Started: Installing Gibbon](https://docs.gibbonedu.org/introduction/installing-gibbon)

For support visit [ask.gibbonedu.org](https://ask.gibbonedu.org) or see [our documentation](https://docs.gibbonedu.org).

## Moodle Integration

This installation includes custom Moodle integration that allows viewing Moodle activities within the Gibbon planner with single sign-on functionality.

### Moodle Configuration

#### 1. Enable User Key Authentication
Navigate to **Site administration → Authentication → Manage authentication** and enable **User key authentication**.

#### 2. Install User Key Authentication Plugin
Download and install the required external login plugin from [https://moodle.org/plugins/auth_userkey](https://moodle.org/plugins/auth_userkey)

#### 3. Create External Service
Navigate to **Site administration → Server → Web services → External services** and create a new external service.

#### 4. Generate Web Service Token
In **Site administration → Server → Web services → Manage tokens**, create an application user and generate a token.

#### 5. Configure External Service Functions
Add the following functions to your external service:
- `auth_userkey_request_login_url`
- `core_calendar_get_calendar_events`
- `core_course_create_courses`
- `core_course_get_courses_by_field`
- `core_enrol_get_enrolled_users`
- `core_user_create_users`
- `core_user_get_users`
- `core_webservice_get_site_info`
- `enrol_manual_enrol_users`
- `enrol_manual_unenrol_users`

### Gibbon Configuration

The Moodle token must be configured in the Gibbon database. Add the following settings to the `gibbonSetting` table:

```sql
INSERT INTO gibbonSetting (scope, name, nameDisplay, description, value) VALUES 
('System', 'moodleUrl', 'Moodle URL', 'Base URL of Moodle installation', 'YOUR_MOODLE_URL'),
('System', 'moodleToken', 'Moodle Token', 'Web service token for Moodle integration', 'YOUR_MOODLE_TOKEN'),
('System', 'moodleTimeout', 'Moodle Timeout', 'Timeout for Moodle requests in seconds', '30');
```

Replace `YOUR_MOODLE_URL` and `YOUR_MOODLE_TOKEN` with your actual values.

## Cutting Edge
If you want to run the latest version of Gibbon, prerelease, you can get the source from our [GitHub repository](https://github.com/GibbonEdu/core). Remember, though, it is not stable, and you may lose data. This is not for the faint of heart.

For installation instructions, be sure to follow the instructions for [Cutting Edge Code](https://docs.gibbonedu.org/introduction/installation-options/cutting-edge-code).

## Translation

Thanks to our amazing volunteers, Gibbon is available in many different languages. We use the online tool [POEditor](https://poeditor.com), which enables our volunteer translators to collaborate and track their translation progress. Huge thanks to POEditor for their support of open source projects and making this tool available for our community. If you would like to help translate Gibbon, please email support@gibbonedu.org and [learn more here](https://gibbonedu.org/about/#languages). Your help would be most appreciated!

## Contributing

We welcome community contribution and aim to ensure Gibbon is an open and friendly environment. Information about contributing, submitting issues, and pull requests can be found in the following docs:

- [**Contributor Guide**](https://github.com/GibbonEdu/core/blob/master/.github/CONTRIBUTING.md) - Learn more about how you can contribute to Gibbon, from code to non-code contributions alike.

- [**Code of Conduct**](https://github.com/GibbonEdu/core/blob/master/.github/CODE_OF_CONDUCT.md) - Our pledge to foster a welcoming community and a positive environment for anyone to participate in.

- [**Developer Workflow**](https://docs.gibbonedu.org/development/getting-started/developer-workflow) - If you want to get involved in the development process, check out our workflow and [GitHub repository](https://github.com/GibbonEdu/core). Generally there will be a development branch with the latest code, as per our [Development Road Map](https://docs.gibbonedu.org/development/gibbon-road-map).

## License

Gibbon is licensed under GNU General Public License v3.0. You can obtain a copy of the license [here](https://github.com/GibbonEdu/core/blob/master/LICENSE).
