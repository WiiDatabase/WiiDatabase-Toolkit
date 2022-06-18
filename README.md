# WiiDatabase Toolkit

The WiiDatabase Toolkit provides various shortcodes for WiiDatabase.de. See the [README.txt](./src/root/README.txt) for more.

It has only been tested with the WiiDatabase theme!

## Build

This project uses [Task](https://github.com/go-task/task).

1. `git clone ...`
2. `npm ci`
3. `composer update`
4. Create `.env.local` and specify the path to your WordPress installation's themes subfolder (
   f.e. `OUTPUT_DIR="C:\www\wordpress\wp-content\plugins\WiiDatabase-Toolkit"`)
5. `task` or `RELEASE=true task` for production

To release, run `RELEASE=true task release`. A ZIP file will be created in the `dist` directory.
