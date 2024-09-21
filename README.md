# CameraAPI
CameraAPI is an API that makes it easy to use the CameraPacket.

# Usage
Install [SimplePacketHandler](https://github.com/Muqsit/SimplePacketHandler/releases) on your server

Register CameraHandler 
```php
if(!CameraHandler::isRegistered())
{
    CameraHandler::register($this);
}
```

# Set Camera Instruction
```php
// only the argument preset is compulsory
$setCameraInstruction = new SetCameraInstruction();
$setCameraInstruction->setPreset(CameraPresets::FREE()); //CameraPresets::FIRST_PERSON(), CameraPresets::THIRD_PERSON(), CameraPresets::THIRD_PERSON_FRONT(), CameraPresets::FOLLOW_ORBIT()
$setCameraInstruction->setEase(CameraSetInstructionEaseType::LINEAR, 1);
$setCameraInstruction->setCameraPosition(new Vector3(100, 100, 100));
$setCameraInstruction->setRotation(0, 0);
$setCameraInstruction->setFacingPosition(new Vector3(0, 0, 0));
$setCameraInstruction->setViewOffset(new Vector2(0, 0));
$setCameraInstruction->send($player);
```
# Fade Camera Instruction
```php
// no argument is compulsory
$fadeCameraInstruction = new FadeCameraInstruction();
$fadeCameraInstruction->setTime(1, 5, 1);
$fadeCameraInstruction->setColor(225, 225, 225);
$fadeCameraInstruction->send($player);
```

# Target Camera Instruction
```php
// only the argument actorUniqueId is compulsory
$targetCameraInstruction = new TargetCameraInstruction();
$targetCameraInstruction->setTargetCenterOffset(new Vector3(0, 0, 0));
$targetCameraInstruction->setActorUniqueId(0);
$targetCameraInstruction->send($player);
```

# Shake Camera Instruction
```php
// all arguments are compulsory
$shakeCameraInstruction = new ShakeCameraInstruction();
$shakeCameraInstruction->setIntensity(0);
$shakeCameraInstruction->setDuration(0);
$shakeCameraInstruction->setDuration(0);
$shakeCameraInstruction->setShakeType(CameraShakePacket::TYPE_POSITIONAL); //CameraShakePacket::TYPE_ROTATIONAL
$shakeCameraInstruction->setShakeAction(CameraShakePacket::ACTION_ADD); //CameraShakePacket::ACTION_STOP
$shakeCameraInstruction->send($player);
```

# Aim Assist Camera Instruction
```php
// all arguments are compulsory
$aimAssistCameraInstruction = new AimAssistCameraInstruction();
$aimAssistCameraInstruction->setViewAngle(new Vector2(0, 0));
$aimAssistCameraInstruction->setDistance(0);
$aimAssistCameraInstruction->setTargetMode(CameraAimAssistTargetMode::ANGLE); //CameraAimAssistTargetMode::DISTANCE
$aimAssistCameraInstruction->setActionType(CameraAimAssistActionType::SET); //CameraAimAssistActionType::CLEAR
$aimAssistCameraInstruction->send($player);
```

# Clear Camera Instruction
```php
// no argument is compulsory
$clearCameraInstruction = new ClearCameraInstruction();
$clearCameraInstruction->setClear(true);
$clearCameraInstruction->setRemoveTarget(true);
$clearCameraInstruction->send($player);
```
