from rest_framework import serializers
from .models import Profile


class ProfileSerializers(serializers.ModelSerializer):
    class Meta:
        model = Profile
        fields = ["id", "username", "first_name", "last_name", "phone"]
        
