# PHPSpec Nyan Formatters Extension

This PHPSpec extension provides more Nyan formatters for PHPSpec.

## Installation

To install this, make sure you are using the latest release of PHPSpec, and then, in a `phpspec.yml` file in the root
of your project, add the following:

```yaml
extensions:
    - MD\NyanFormattersExtension\Extension
```

Then, you can add a `--format` switch to your `phpspec` command with one of the following values:

- `nyan.cat` - Gives the standard Nyan Cat formatter
- `nyan.dino` - Gives a dinosaur formatter - Rawwr!
- `nyan.crab` - Gives a crab formatter
