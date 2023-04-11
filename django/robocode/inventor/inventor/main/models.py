from django.db import models

# Create your models here.


class Room(models.Model):
    name = models.CharField(max_length=150)
    slug = models.SlugField(max_length=150)

    def __str__(self):
        return self.name


class Owner(models.Model):
    name = models.CharField(max_length=150)
    slug = models.SlugField(max_length=150)

    def __str__(self):
        return self.name


class MyObject(models.Model):
    name = models.CharField(max_length=150)
    slug = models.SlugField(max_length=150)
    room = models.ForeignKey(
        Room, on_delete=models.PROTECT, related_name='rooms')
    description = models.TextField(blank=True)
    owner = models.ForeignKey(
        Owner, on_delete=models.PROTECT, related_name='owners')

    def __str__(self):
        return self.name
