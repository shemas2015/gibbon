# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Gibbon is a flexible, open source school management platform designed to make life better for teachers, students, parents and schools. Built with PHP and using a MySQL database, it provides comprehensive functionality for managing all aspects of school operations.

## Development Commands

### Testing
- **Run all tests**: `composer test` (runs both Codeception and PHPUnit)
- **Run acceptance tests**: `composer test:codeception`  
- **Run unit tests**: `composer test:phpunit`
- **Run PHPStan static analysis**: `composer test:phpstan`
- **Run code style check**: `composer test:codesniffer`

For debugging acceptance tests, use:
- `composer test:codeceptiondebug`

### Database Setup
- Initialize/update database: Run `php cli/system_backgroundProcessor.php` or access the installer at `/installer/install.php`
- SQL files: `gibbon.sql` (main schema), `gibbon_demo.sql` (demo data)

### Configuration
- Main config: `config.php` (database connection, GUID, caching settings)
- Core bootstrap: `gibbon.php` (autoloader, container setup)
- Entry point: `index.php`

## Architecture Overview

### Core Structure
- **MVC Pattern**: Pages follow a module-based structure under `/modules/`
- **Dependency Container**: Uses League Container for dependency injection
- **Service Providers**: Core services defined in `src/Services/`
- **Domain Layer**: Business logic organized in `src/Domain/` with Gateway pattern
- **Forms System**: Comprehensive form builder in `src/Forms/`
- **Template Engine**: Uses Twig templates with custom theme support

### Key Components

**Database Layer**:
- `src/Database/Connection.php` - MySql PDO wrapper
- `src/Domain/Gateway.php` - Base gateway with query builder
- Domain-specific gateways in `src/Domain/[Module]/`

**Authentication & Sessions**:
- `src/Auth/` - Authentication adapters (default, OAuth, MFA)
- `src/Session/` - Custom session handling with database storage
- Role-based access control throughout

**UI Framework**:
- `src/UI/` - UI components, charts, timetables, dashboards  
- `src/Tables/` - Data table system with actions and pagination
- `src/Forms/` - Form builder with custom field types

**Modules**:
Each module in `/modules/[ModuleName]/` contains:
- Page scripts (PHP files for routes)
- `moduleFunctions.php` - Module-specific helper functions
- Domain gateways in `src/Domain/[ModuleName]/`

### Directory Structure
- `/modules/` - All module functionality organized by feature
- `/src/` - Core framework code (PSR-4 autoloaded under `Gibbon\` namespace)
- `/themes/` - UI themes and styling
- `/uploads/` - User uploads and generated files
- `/lib/` - Third-party JavaScript libraries
- `/cli/` - Command-line scripts for background processes
- `/i18n/` - Internationalization files
- `/resources/` - Static resources and assets

### Development Patterns
- **Gateway Pattern**: Database access through domain-specific gateways
- **Service Locator**: Core services accessed via dependency container
- **Template Inheritance**: Twig templates with theme overrides
- **Event System**: Hooks for extending functionality
- **Builder Pattern**: Forms and UI components use fluent builders

### Key Files
- `functions.php` - Global utility functions
- `version.php` - Version information
- `privacyPolicy.php` - Privacy policy display
- `error.php` - Error handling display

### Background Processing
- `cli/system_backgroundProcessor.php` - Main background task processor
- Various CLI scripts for notifications, reports, and maintenance

### File Upload System
- `src/Gibbon/FileUploader.php` - Handles file uploads with validation
- Upload destinations configured per module/function

This architecture supports a modular, extensible school management system with clean separation between data access, business logic, and presentation layers.